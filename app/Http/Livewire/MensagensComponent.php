<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Conversa;
//Topicos
use App\Models\Topico;
use App\Models\vozModelo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class MensagensComponent extends Component
{

    protected $listeners = ['topicoSelected' => 'topicoSelected', 'getAiMessages' => 'getAiMessages', 'transcript' => 'transcript'];

    public $topico = null, $titulo = null, $numMensagens = 0;

    public $messages = [];
    public $input = '';

    public $select = false;

    public $voz, $userVozModelo;

    public function mount()
    {
        $this->getVoz();
    }

    public function getVoz()
    {
        //se o usuario logado n tiver uma vozModelo, cria uma
        if (vozModelo::where('user_id', Auth::user()->id)->doesntExist()) {
            $vozModelo = new vozModelo();
            $vozModelo->user_id = Auth::user()->id;
            $vozModelo->save();
        }

        //pega a vozModelo do usuario logado
        $this->userVozModelo = vozModelo::where('user_id', Auth::user()->id)->first();

        //se a vozModelo do usuario logado n tiver uma voz, cria uma
        $this->voz = $this->userVozModelo->voz;
    }

    public function transcript($transcript)
    {
        $this->input = $transcript;
        $this->sendMessage();
    }
    public function topicoSelected($topico)
    {
        $this->topico = $topico;
        $this->titulo = Topico::find($topico)->titulo;
        $this->getMessages();
        $this->select = true;
    }

    public function sendMessage()
    {

        $conversa = new Conversa();
        $conversa->topico_id = $this->topico;
        $conversa->role = 'user';
        $conversa->content = $this->input;
        $conversa->save();

        $this->getMessages();
        $this->input = '';
        $this->getAiMessages();
    }

    public function getAiMessages()
    {
        $this->getMessages();

        // Cria um array vazio para armazenar as mensagens
        $messagesArray = array();
        // Pega as ultimas 20 mensagens
        $messages = Conversa::where('topico_id', $this->topico)->orderBy('created_at', 'desc')->take(10)->get();
        // Adiciona as outras mensagens ao array de mensagens com as ultimas 20 mensagens
        foreach ($messages as $message) {
            $messagesArray[] = array("role" => $message->role, "content" => $message->content);
        }

        // Inverte o array para que as mensagens mais recentes fiquem no topo
        $messagesArray = array_reverse($messagesArray);


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            "model" => "gpt-3.5-turbo",
            "messages" => $messagesArray,
        ]));

        $headers = [
            "Authorization: Bearer " . env('OPENAI_API_KEY'),
            "Content-Type: application/json"
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close($ch);

        $response = json_decode($result, true);
        $conversa = new Conversa();
        $conversa->topico_id = $this->topico;
        $conversa->role = 'assistant';
        $conversa->content = $response['choices'][0]['message']['content'];
        $conversa->save();

        $this->getMessages();

        $this->emit('texto', $conversa->id);
    }

    public function qrcode($id)
    {
        $this->emit('qrcode', $id);
    }

    public function deleteChat()
    {
        //delete todas as mensagens deste topico
        Conversa::where('topico_id', $this->topico)->delete();
        //depois delete o topico
        Topico::find($this->topico)->delete();
        $this->select = false;
        $this->emit('topicoDeleted');
    }

    public function getMessages()
    {
        $this->messages = Conversa::where('topico_id', $this->topico)->get();
        $this->numMensagens = $this->messages->count();
        $this->emit('scrollToBottom');
    }

    public function textAudio($conversaID)
    {
        $this->emit('texto', $conversaID);
    }

    public function render()
    {
        return view('livewire.mensagens-component');
    }
}
