<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'modalidade',
        'dia',
        'inicia',
        'termina',
        'local',
        'material',
        'agenda',
        'observacoes',
        'evento_id'
    ];

    /*
    * Obtém o recurso de Evento ao qual o horario pertence
    *
    */
    public function evento() {
        return $this->belongsTo(Evento::class);
    }
}
