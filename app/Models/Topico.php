<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topico extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'user_id'
    ];

    public function conversas()
    {
        return $this->hasMany(Conversa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
