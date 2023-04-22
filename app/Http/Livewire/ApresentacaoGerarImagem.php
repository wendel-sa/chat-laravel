<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ApresentacaoGerarImagem extends Component
{

    protected $listeners = ['gerarImagem' => 'getImagens'];
    public $imagens = null;



    public function getImagens()
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/images/generations");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            "prompt" => "um frango dançarino",
            "n" => 1,
            "size" => "512x512",
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

        // Decodifique a resposta JSON e obtenha a URL da imagem
        $responseData = json_decode($result, true);
        $imageUrl = $responseData['data'][0]['url'];

        // Baixe a imagem e armazene em uma variável
        $imageData = file_get_contents($imageUrl);

        // Exiba a imagem
        $this->imagens = $imageData;

        $this->emit('imagemGerada');
    }

    public function render()
    {
        return view('livewire.apresentacao-gerar-imagem');
    }
}
