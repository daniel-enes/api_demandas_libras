<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsavel;
use App\Http\Resources\ResponsaveisResource;

class ResponsaveisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //if($request->has('cpf') and $request->cpf != null )
        if($request->has('cpf'))
        {
            return Responsavel::getResourceCPF($request->cpf);
        }
        
        $responsaveis = Responsavel::all();
        return ResponsaveisResource::collection($responsaveis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $responsavel = Responsavel::create([
            'nome' => $request->input('data.attributes.nome'),
            'telefone' => $request->input('data.attributes.telefone'),
            'email' => $request->input('data.attributes.email'),
            'ocupacao' => $request->input('data.attributes.ocupacao'),
            'cpf' => $request->input('data.attributes.cpf'),
            'registro' => $request->input('data.attributes.registro'),
        ]);
        return new ResponsaveisResource($responsavel);


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$responsavel = Responsavel::find($id);
        $responsavel = Responsavel::getResource($id);
        return new ResponsaveisResource($responsavel);
        
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
        $responsavel = Responsavel::getResource($id);
        $responsavel->update($request->input('data.attributes'));
        return new ResponsaveisResource($responsavel);
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
