<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\conversa as Conversa;
use App\Models\vozModeloHistorico;


class ShareComponent extends Component
{
    public $conversa = null;
    public $voz = null;
    public $audio = null;

    public function mount()
    {
        $id = request()->route('id');
        $this->conversa = Conversa::find($id);
        $this->voz = $this->conversa->voz;
        $audio = vozModeloHistorico::where('conversa_id', $this->conversa->id)->where('voz', 'google')->first();
        $this->audio = $audio->file;
    }
    public function render()
    {
        return view('livewire.share-component');
    }
}
