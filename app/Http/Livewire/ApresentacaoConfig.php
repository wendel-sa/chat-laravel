<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ApresentacaoConfig extends Component
{

    public function imagem()
    {
        $this->emit('gerarImagem');
    }
    public function render()
    {
        return view('livewire.apresentacao-config');
    }
}
