<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vozModeloHistorico extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'voz',
        'conversa_id',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function conversa()
    {
        return $this->belongsTo(conversa::class);
    }
}
