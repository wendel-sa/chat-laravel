<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apresentacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'link',
        'imagem',
        'role',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function apresentacaoPaginas()
    {
        return $this->hasMany(apresentacaoPagina::class);
    }

    public function apresentacaoPaginaTextos()
    {
        return $this->hasManyThrough(apresentacaoPaginaTexto::class, apresentacaoPagina::class);
    }
}
