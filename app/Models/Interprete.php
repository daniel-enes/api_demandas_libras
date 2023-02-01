<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interprete extends Model
{
    //use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'status',
    ];

    public function horarios() 
    {
        return $this->belongsToMany(Horario::class);
    }
}
