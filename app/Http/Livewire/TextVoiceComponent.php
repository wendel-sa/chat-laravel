<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TextVoiceComponent extends Component
{
    protected $listeners = ['vozModelo' => 'textChanged'];

    public $textToSpeak;

    public function textChanged($voz)
    {
        $this->textToSpeak = $voz;
    }
    public function render()
    {
        return view('livewire.text-voice-component');
    }
}
