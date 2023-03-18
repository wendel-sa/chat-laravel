<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\conversa as Conversa;
use Illuminate\Support\Str;


class QrCodeComponent extends Component
{
    protected $listeners = ['qrcode' => 'qrcode'];
    public $qrcode = null, $url = null;

    public function qrcode($conversa)
    {
        $conversa = Conversa::find($conversa);
        $texto = $conversa->id;
        $url = route('share', ['id' => $texto]);
        $response = Http::get('https://chart.googleapis.com/chart', [
            'chs' => '300x300',
            'cht' => 'qr',
            'chl' => $url,
        ]);

        $this->qrcode = 'data:image/png;base64,' . base64_encode($response->body());
        $this->url = $url;
        $this->toast();
    }

    public function toast()
    {
        $this->emit('showToast');
    }

    public function render()
    {
        return view('livewire.qr-code-component');
    }
}
