<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Alaouy\Youtube\Facades\Youtube;

class ResumoMensagem extends Component
{

    protected $listeners = [
        'openModal' => 'showModal',
    ];

    public $showModal = false;


    public $mensagem, $videos, $open = false;

    public function mount($message)
    {
        $this->mensagem = $message['content'];
    }

    public function palavrasChaves($mensagem)
    {


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/completions");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            "model" => "text-davinci-003",
            "prompt" => "Extraia o titulo para uma pesquisa no youtube do seguinte texto:\n\n" . $mensagem,
            "temperature" => 0.5,
            "max_tokens" => 60,
            "top_p" => 1.0,
            "frequency_penalty" => 0.8,
            "presence_penalty" => 0.0
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

        $result = json_decode($result, true);

        $texto = $result['choices'][0]['text'];

        return $texto;
    }

    public function searchYoutube()
    {
        $this->open = true;
        $pesquisa = $this->palavrasChaves($this->mensagem);
        $videos = Youtube::searchVideos($pesquisa, 10);
        $dados = [];
        foreach ($videos as $video) {
            $dado = $videoList = Youtube::getVideoInfo($video->id->videoId);
            $dados[] = $dado;
        }

        $this->videos = $dados;
    }

    public function showModal()
    {
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.resumo-mensagem');
    }
}
