<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apresentacaoPaginaTexto extends Model
{
    use HasFactory;

    protected $fillable = [
        'texto',
        'apresentacao_pagina_id',
    ];

    public function apresentacaoPagina()
    {
        return $this->belongsTo(apresentacaoPagina::class);
    }
    
}
