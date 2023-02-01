<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Http\Resources\InterpretesCollection;

class HorariosInterpretesRelatedController extends Controller
{
    public function index($id) {
        $horario = Horario::find($id);
        return new InterpretesCollection($horario->interpretes);
    }
}
