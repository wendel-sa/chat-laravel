<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\vozModelo;
use Illuminate\Support\Facades\Auth;

class ConfigComponent extends Component
{


    protected $listeners = ['texto' => 'modelo'];
    
    public $voz, $userVozModelo;

    public function mount()
    {
        $this->getVoz();
    }

    public function getVoz()
    {
        //se o usuario logado n tiver uma vozModelo, cria uma
        if (vozModelo::where('user_id', Auth::user()->id)->doesntExist()) {
            $vozModelo = new vozModelo();
            $vozModelo->user_id = Auth::user()->id;
            $vozModelo->save();
        }

        //pega a vozModelo do usuario logado
        $this->userVozModelo = vozModelo::where('user_id', Auth::user()->id)->first();

        //se a vozModelo do usuario logado n tiver uma voz, cria uma
        $this->voz = $this->userVozModelo->voz;
    }

    public function voz($voz)
    {
        $this->voz = $voz;
        $this->userVozModelo->voz = $this->voz;
        $this->userVozModelo->save();
        $this->emit('vozModelo', $this->voz);
    }


    public function modelo($conversa)
    {
      //se o modelo do usuario for google mande um emit textoGoogle se for aws emit aws e se n tiver ou for sistema mande um emit sistema
        if ($this->voz == 'google') {
            $this->emit('textoGoogle', $conversa);
        } elseif ($this->voz == 'aws') {
            $this->emit('textoAws', $conversa);
        } else {
            $this->emit('sistema', $conversa);
        }
    }
    public function render()
    {
        return view('livewire.config-component');
    }
}
