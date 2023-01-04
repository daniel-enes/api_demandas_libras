<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\ResponsaveisResource;

class Responsavel extends Model
{
    //use HasFactory;

    /* A tabela associado com o modelo */
    protected $table = 'responsaveis';

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'ocupacao',
        'registro',
        'cpf'
    ];

    public static function getResource($id) {
        return self::find($id);
    }

    public static function getResourceCPF($cpf) {
        $responsavel = self::where('cpf', $cpf)->first();
        if(!isset($responsavel)) {
            return '{"data": null}';
        }
        return new ResponsaveisResource($responsavel);
    }
}
