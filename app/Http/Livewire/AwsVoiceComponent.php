<?php

namespace App\Http\Livewire;

use Aws\Polly\PollyClient;
use Livewire\Component;
use App\Models\conversa;
use Illuminate\Support\Facades\Auth;
use App\Models\vozModeloHistorico;

class AwsVoiceComponent extends Component
{

    protected $listeners = ['textoAws' => 'textoEmFala'];

    public $text = "Este é o modelo de voz da AWS";

    public $textToSpeak;

    public $conversa;
    public $audio;


    public function textAws($text)
    {
        $this->text = $text;
        $this->synthesizeSpeech();
    }

    public function synthesizeSpeech()
    {
        $client = new PollyClient([
            'version' => 'latest',
            'region' => 'us-west-2', // substitua pela região desejada
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ]
        ]);
        $result = $client->describeVoices(
            [
                'LanguageCode' => 'pt-BR',
            ]
        );



        $result = $client->synthesizeSpeech([
            'OutputFormat' => 'mp3',
            'engine' => 'neural',
            'Text' => $this->textToSpeak,
            'VoiceId' => 'Camila', // substitua pelo nome da voz desejada
        ]);

        $audio = $result->get('AudioStream')->getContents();


        $path = public_path('audio/aws/' . uniqid() . '.mp3'); // caminho para salvar o arquivo de áudio

        file_put_contents($path, $audio); // salva o arquivo de áudio no disco

        $this->audio = $path;

        $vozModeloHistorico = new vozModeloHistorico();
        $vozModeloHistorico->conversa_id = $this->conversa->id;
        $vozModeloHistorico->user_id = Auth::user()->id;
        $vozModeloHistorico->voz = 'aws';
        $vozModeloHistorico->file = $path;
        $vozModeloHistorico->save();

        $this->emit('awsSource');
    }

    public function textoEmFala($conversa)
    {
        $conversa = conversa::find($conversa);
        $this->conversa = $conversa;
        //verifica se a conversa tem um arquivo de audio já salvo
        $vozModeloHistorico = vozModeloHistorico::where('conversa_id', $conversa->id)->where('voz', 'aws')->first();
        if ($vozModeloHistorico) {
            $this->audio = $vozModeloHistorico->file;
            $this->emit('awsSource');
            return;
        }

        $this->textToSpeak = $conversa->content;
        $this->synthesizeSpeech();
    }

    public function render()
    {
        return view('livewire.aws-voice-component');
    }
}
