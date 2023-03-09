<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conversa extends Model
{
    use HasFactory;

    protected $fillable = [
        'topico_id',
        'role',
        'content'
    ];

    public function topico()
    {
        return $this->belongsTo(Topico::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
