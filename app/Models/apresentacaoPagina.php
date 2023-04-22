<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apresentacaoPagina extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'titulo',
        'descricao',
        'cor',
        'imagem',
        'apresentacao_id',
    ];

    public function apresentacao()
    {
        return $this->belongsTo(apresentacao::class);
    }

}
