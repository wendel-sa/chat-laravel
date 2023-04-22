<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Apresentacao;
use App\Models\apresentacaoPagina;
use App\Models\apresentacaoPaginaTexto;
use Illuminate\Support\Facades\Auth;
use Colors\RandomColor;


class ApresentacaoShow extends Component
{

    public $apresentacao = null, $textos = null, $click = false, $apresentacao_id = null;
    public $apresentacaoPaginas;
    public $apresentacaoPaginaTextos;
    public $etapa = 0;

    public function mount()
    {
        $this->getApresentacao();
    }

    public function getApresentacao()
    {
        $this->etapa = 0;
        $id = request()->route()->parameter('id');
        $this->apresentacao_id = $id;
        $this->apresentacao($id);
    }

    public function apresentacao($id)
    {
        $this->apresentacao = Apresentacao::find($id);
        $this->apresentacaoPaginas = apresentacaoPagina::where('apresentacao_id', $id)->get();
        foreach ($this->apresentacaoPaginas as $pagina) {
            $this->apresentacaoPaginaTextos[$pagina->id] = apresentacaoPaginaTexto::where('apresentacao_pagina_id', $pagina->id)->get();
        }
        $this->textos = $this->apresentacaoPaginaTextos;
        $this->emit('apresentacao_id', $id);
    }

    public function gerarApresentação()
    {
        $apresentacao = $this->apresentacao;
        $this->click = $apresentacao;
        $titulo = $apresentacao->titulo;
        $this->emit('presentacao');
        $this->etapa = 25;
        $this->emit('percentual', $this->etapa);
        if ($apresentacao->descricao == null) {
            $comando = "Elabore textos para" . $titulo . ", separande em partes. Indicando inicio e fim de cada página.";
            $messagesArray[] = array("role" => 'user', "content" => $comando);
            $this->getAiResponse($messagesArray);
        } else {

            $this->getTextos();
        }
    }

    public function getAiResponse($messagesArray)
    {

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
        $conversa = $response['choices'][0]['message']['content'];


        $this->etapa = 50;
        $this->emit('percentual', $this->etapa);


        $this->formataTexto($conversa);
    }

    public function formataTexto($texto)
    {
        //percorra o texto e em cada \n separe o trecho e coloque dentro de um array
        $textoArray[] = null;
        // com \n separe o trecho e coloque dentro de um array
        $textoArray = explode("\n", $texto);

        // e com . separe o trecho e coloque dentro de um array
        $textoArray = explode(".", $texto);

        //

        //percorra o array e separe o texto em 10 partes
        $Array10[] = null;
        $Array10 = array_chunk($textoArray, 2);

        //veja quantos esáçps tem o Array10
        $numEspacos = count($Array10);

        $teste = RandomColor::many($numEspacos);

        //gere no baco de dados na tabela apresentacaoPagina o numero de paginas
        for ($i = 0; $i < $numEspacos; $i++) {
            $apresentacaoPagina = new apresentacaoPagina();
            $apresentacaoPagina->apresentacao_id = $this->apresentacao_id;
            $apresentacaoPagina->numero = $i + 1;
            $apresentacaoPagina->cor = str_replace("#", "", $teste[$i]);
            $apresentacaoPagina->save();
            //pegue o id da pagina
            $numTextos = count($Array10[$i]);
            $pagina_id = apresentacaoPagina::where('apresentacao_id', $this->apresentacao_id)->latest()->first()->id;
        }

        //percorra o array e insira os textos na tabela apresentacaoPaginaTexto
        $paginas = apresentacaoPagina::where('apresentacao_id', $this->apresentacao_id)->get();

        foreach ($paginas as $pagina) {
            $textoPagina = $Array10[$pagina->numero - 1];
            foreach ($textoPagina as $texto) {
                $apresentacaoPaginaTexto = new apresentacaoPaginaTexto();
                $apresentacaoPaginaTexto->apresentacao_pagina_id = $pagina->id;
                $apresentacaoPaginaTexto->texto = $texto;
                $apresentacaoPaginaTexto->save();
            }
        }

        $apresentacao = Apresentacao::find($this->apresentacao_id);
        $apresentacao->descricao = "Elaborado";
        $apresentacao->save();

        $this->etapa = 75;
        sleep(2);
        $this->emit('percentual', $this->etapa);

        $this->getTextos();

        $this->etapa = 100;
        $this->apresentacao($this->apresentacao_id);
    }

    public function getTextos()
    {
        $this->emit('apresentacao_id', $this->apresentacao_id);
    }

    public function render()
    {
        return view('livewire.apresentacao-show');
    }
}
