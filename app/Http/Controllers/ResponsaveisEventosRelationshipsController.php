<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsavel;
use App\Http\Resources\EventosIdentifierResource;

class ResponsaveisEventosRelationshipsController extends Controller
{
    public function index($id) {
        $responsaveis = Responsavel::find($id);
        return EventosIdentifierResource::collection($responsaveis->eventos);
    }
}
