<?php

namespace App\Http\Controllers;
use App\Models\Horario;
use App\Http\Resources\InterpretesIdentifierResource;

use Illuminate\Http\Request;

class HorariosInterpretesRelationshipsController extends Controller
{
    public function index($id)
    {
        $horario = Horario::find($id);
        return InterpretesIdentifierResource::collection($horario->interpretes);
    }

    public function update(Request $request, $id) 
    {
        $horario = Horario::find($id);
        $ids = $request->input('data.*.id');
        $horario->interpretes()->sync($ids);
        return response(null, 204);
    }
}
