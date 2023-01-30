<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interprete;
use App\Http\Requests\CreateInterpreteRequest;
use App\Http\Resources\InterpretesResource;
use App\Http\Resources\InterpretesCollection;
use Spatie\QueryBuilder\QueryBuilder;

class InterpretesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('sort')) {
            $interpretes = QueryBuilder::for(Interprete::class)
            ->allowedSorts(['nome'])
            ->get();
            //->allowedFilters(['titulo'])
            //->jsonPaginate();
            return new InterpretesCollection($interpretes);
        }

        $interpretes = Interprete::all();
        return new InterpretesCollection($interpretes);

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
    public function store(CreateInterpreteRequest $request)
    {
        $interprete = Interprete::create([
            'nome' => $request->input('data.attributes.nome'),
            'telefone' => $request->input('data.attributes.telefone'),
            'email' => $request->input('data.attributes.email'),
            'status' => $request->input('data.attributes.status'),
        ]);
        return new InterpretesResource($interprete);
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
