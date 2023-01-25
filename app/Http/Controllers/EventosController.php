<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;
use App\Models\Responsavel;
use App\Http\Resources\EventosResource;
use App\Http\Resources\EventosCollection;
use App\Http\Requests\CreateEventoRequest;
use Spatie\QueryBuilder\QueryBuilder;

class EventosController extends Controller
{
    /* 
    * Obtém o total de recursos na coleção
    *
    * @return response
    
    public function getCount() {
        $total = Evento::getCount();
        return $total;
    }
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$eventos = Evento::all();
        return EventosResource::collection($eventos);*/
        $eventos = QueryBuilder::for(Evento::class)
        ->allowedSorts(['id'])
        ->allowedFilters(['titulo'])
        ->jsonPaginate();
        return new EventosCollection($eventos);
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
    public function store(CreateEventoRequest $request)
    {
        $evento = new Evento([
            'titulo' => $request->input('data.attributes.titulo'),
            'sobre' =>  $request->input('data.attributes.sobre'),
            'informacoes' => $request->input('data.attributes.informacoes')
        ]);

        $responsavel = Responsavel::find($request->input('data.relationships.responsaveis.data.id'));
        
        $responsavel->eventos()->save($evento);

        return new EventosResource($evento);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);
        return new EventosResource($evento);
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
