<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Topico;
use Illuminate\Support\Facades\Auth;

class TopicoComponent extends Component
{

    protected $listeners = ['topicoDeleted' => 'getTopicos'];

    public $titulo = '';
    public $user_id;

    public $click = false, $ultMensagem = false;

    public $Topicos = [];

    public function mount()
    {
        $this->getTopicos();
    }

    public function getTopicos()
    {
        $this->Topicos = Topico::where('user_id', Auth::user()->id)->get();
        //do mais recente para o mais antigo
        $this->Topicos = $this->Topicos->sortByDesc('created_at');
    }

    public function selectTopico($topico)
    {
        $this->click = $topico;
        //busque a ultima mensagem do topico selecionado
        $this->ultMensagem = Topico::find($topico)->conversas->last();
        if($this->ultMensagem)
            $this->ultMensagem = $this->ultMensagem->content;
        $this->emit('topicoSelected', $topico);
    }

    public function newTopico()
    {
        $this->validate([
            'titulo' => 'required'
        ]);

        $topico = new Topico();
        $topico->titulo = $this->titulo;
        $topico->user_id = Auth::user()->id;
        $topico->save();

        $this->titulo = '';
        $this->getTopicos();
    }

    public function render()
    {
        return view('livewire.topico-component');
    }
}
