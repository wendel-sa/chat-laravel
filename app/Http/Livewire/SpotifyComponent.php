<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spotify;

class SpotifyComponent extends Component
{

    public $search = '', $tracks = [], $track = [], $open = false;
    public $mensagem;

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
            "prompt" => "Extraia o titulo para uma pesquisa no spotify uma playlist seguinte texto:\n\n" . $mensagem,
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

    public function search()
    {
        $this->search = $this->palavrasChaves($this->mensagem);
        $this->tracks = Spotify::searchEpisodes($this->search)->get();
        dd($this->tracks, $this->search);
    }

    public function render()
    {
        return view('livewire.spotify-component');
    }
}
