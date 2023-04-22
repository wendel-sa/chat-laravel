<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Apresentacao;
use App\Models\apresentacaoPagina;
use App\Models\apresentacaoPaginaTexto;
use Illuminate\Support\Facades\Auth;

class ApresentacaoUserPagina extends Component
{

    protected $listeners = ['apresentacao' => 'apresentacao'];

    public $textos = null;
    public $apresentacao = null;
    public $apresentacaoPaginas;
    public $apresentacaoPaginaTextos;

    public function mount()
    {
        $this->getApresentacao();
    }

    public function getApresentacao()
    {
        //pegue a apresentacao com o if=d da rota atual
        $id = request()->route()->parameter('id');
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

    public function render()
    {
        return view('livewire.apresentacao-user-pagina');
    }
}
