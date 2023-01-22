<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\HorariosResource;
use App\Models\Horario;
use App\Models\Evento;
use App\Http\Requests\CreateHorarioRequest;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHorarioRequest $request)
    {
        $horario = new Horario([
            'modalidade' => $request->input('data.attributes.modalidade'),
            'dia' => $request->input('data.attributes.dia'),
            'inicia' => $request->input('data.attributes.inicia'),
            'termina' => $request->input('data.attributes.termina'),
            'local' => $request->input('data.attributes.local'),
            'material' => $request->input('data.attributes.material'),
            'agenda' => $request->input('data.attributes.agenda'),
            'observacoes' => $request->input('data.attributes.observacoes'),
        ]);

        $evento = Evento::find($request->input('data.relationships.eventos.data.id'));

        $evento->horarios()->save($horario);

        return new HorariosResource($horario);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
