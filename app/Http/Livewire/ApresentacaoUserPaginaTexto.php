<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Apresentacao;
use App\Models\apresentacaoPagina;
use App\Models\apresentacaoPaginaTexto;
use Illuminate\Support\Facades\Auth;

class ApresentacaoUserPaginaTexto extends Component
{

    public $apresentacaoPaginaTexto;

    public function mount($id)
    {
        //busque todos os textos da pagina
        $this->apresentacaoPaginaTexto = apresentacaoPaginaTexto::where('apresentacao_pagina_id', $id)->get();
    }

    //quando o texto for atualizado, atualize o banco de dados
    public function updated($field)
    {
        $this->validateOnly($field, [
            'apresentacaoPaginaTexto.*.texto' => 'required',
        ]);

        foreach($this->apresentacaoPaginaTexto as $texto)
        {
            $texto->save();
        }
    }

    public function render()
    {
        return view('livewire.apresentacao-user-pagina-texto');
    }
}
