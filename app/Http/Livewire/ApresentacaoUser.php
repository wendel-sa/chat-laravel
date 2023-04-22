<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Apresentacao;
use App\Models\apresentacaoPagina;
use App\Models\apresentacaoPaginaTexto;
use Illuminate\Support\Facades\Auth;
use Colors\RandomColor;

class ApresentacaoUser extends Component
{

    protected $listeners = ['apresentacao_id' => 'click'];
    public $titulo = '';

    public $apresentacao_id;

    public $user_id;
    public $click = false;
    public $Apresentacoes = '';

    public function mount()
    {
        $this->getApresentacoes();
    }

    public function getApresentacoes()
    {
        $this->user_id = Auth::user()->id;
        $this->Apresentacoes = Apresentacao::where('user_id', $this->user_id)->get();
    }

    public function click($apresentacao)
    {
        dd($apresentacao);
        $this->click($apresentacao);
    }

  

    public function newApresentacao()
    {
        $this->validate([
            'titulo' => 'required'
        ]);

        $apresentacao = new Apresentacao();
        $apresentacao->titulo = $this->titulo;
        $apresentacao->user_id = $this->user_id;
        $apresentacao->save();

        $this->titulo = '';
        $this->getApresentacoes();
    }



    public function render()
    {
        return view('livewire.apresentacao-user');
    }
}
