<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;

//isa model conversa, auth, vozModeloHistorico
use App\Models\conversa;
use Illuminate\Support\Facades\Auth;
use App\Models\vozModeloHistorico;

class GoogleVoiceComponent extends Component
{

    protected $listeners = ['textoGoogle' => 'textoEmFala'];

    public $textToSpeak;

    public $conversa;
    public $audio;

    public function mount()
    {
        $this->textToSpeak = 'Este é o modelo de voz do google';
       // $this->googleVoice();
    }

    public function googleVoice()
    {
        $textToSpeak = $this->textToSpeak;

        $json = env('GOOGLE_APPLICATION_CREDENTIALS');
        $json = json_decode(file_get_contents($json), true);

        $client = new TextToSpeechClient([
            'credentials' => $json
        ]);

        $audioConfig = new AudioConfig();
        $audioConfig->setAudioEncoding(AudioEncoding::LINEAR16);
        $audioConfig->setPitch(0);
        $audioConfig->setSpeakingRate(1);

        $synthesisInputText = new SynthesisInput();
        $synthesisInputText->setText($this->textToSpeak);

        $voice = new VoiceSelectionParams();
        $voice->setLanguageCode('pt-BR');
        $voice->setName('pt-BR-Neural2-C');

        $response = $client->synthesizeSpeech($synthesisInputText, $voice, $audioConfig);
        $audioContent = $response->getAudioContent();

        $path = public_path('audio/google/' . uniqid() . '.mp3'); // caminho para salvar o arquivo de áudio

        file_put_contents($path, $audioContent);

        $this->audio = $path;

        $vozModeloHistorico = new vozModeloHistorico();
        $vozModeloHistorico->conversa_id = $this->conversa->id;
        $vozModeloHistorico->user_id = Auth::user()->id;
        $vozModeloHistorico->voz = 'google';
        $vozModeloHistorico->file = $path;
        $vozModeloHistorico->save();

        $this->emit('googleSource');
    }

    public function textoEmFala($conversa)
    {
        $conversa = conversa::find($conversa);
        $this->conversa = $conversa;
        //verifica se a conversa tem um arquivo de audio já salvo
        $vozModeloHistorico = vozModeloHistorico::where('conversa_id', $conversa->id)->where('voz', 'google')->first();
        if ($vozModeloHistorico) {
            $this->audio = $vozModeloHistorico->file;
            $this->emit('googleSource');
            return;
        }

        $this->textToSpeak = $conversa->content;
        $this->googleVoice();
    }
    public function render()
    {
        return view('livewire.google-voice-component');
    }
}
