<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsavel;
use App\Http\Resources\EventosCollection;

class ResponsaveisEventosRelatedController extends Controller
{
    public function index($id) {
        $responsavel = Responsavel::find($id);
        return new EventosCollection($responsavel->eventos);
    }
}
