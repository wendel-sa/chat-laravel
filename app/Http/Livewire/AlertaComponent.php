<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AlertaComponent extends Component
{
    protected $listeners = ['copied' => 'alerta'];

    public function alerta()
    {
        //retorna um script que acina o lart do navegar informando texto copiado
        $this->dispatchBrowserEvent('alerta');
        
    }
    public function render()
    {
        return view('livewire.alerta-component');
    }
}
