<?php

namespace App\Http\Controllers;

use App\Http\Resources\VersiculoResource;
use App\Http\Resources\VersiculosCollection;
use Illuminate\Http\Request;
use App\Models\Versiculo;
use Illuminate\Support\Facades\App;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new VersiculosCollection(Versiculo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Versiculo::create($request->all())) {
            return response()->json([
                'message' => 'Versículo cadastrado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Versículo cadastrado com erro'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function show($versiculo)
    {
        $versiculo = Versiculo::with('livros')->find($versiculo);
        // dd()
        return new VersiculoResource($versiculo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $versiculo)
    {
        $versiculo_obj = Versiculo::find($versiculo);
        $versiculo_obj->fill($request->all());

        if($versiculo_obj->save()){
            return response()->json([
                'message' => 'Versículo cadastrado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao fazer update'
            ], 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($versiculo)
    {
        if(Versiculo::destroy($versiculo)) {
            return response()->json([
                'message' => 'Versículo apagado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao apagar'
            ], 404);
        }
    }
}
