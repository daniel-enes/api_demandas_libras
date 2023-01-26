<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'sobre',
        'informacoes',
        'responsaveis_id',
    ];

    public static function getCount() {
        return self::all()->count();
    }

    /*
    * Obtém o recurso de Responsavel ao qual o evento pertence
    *
    */
    public function responsavel() 
    {
        return $this->belongsTo(Responsavel::class);
    }
    
    /*
    * Determina o relacionanto com Horario
    *
    */
    public function horarios() {
        return $this->hasMany(Horario::class);
    }
}
