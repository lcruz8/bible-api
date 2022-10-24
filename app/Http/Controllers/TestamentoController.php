<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestamentoResource;
use App\Http\Resources\TestamentosCollection;
use Illuminate\Http\Request;
use App\Models\Testamento;
use Illuminate\Support\Facades\App;

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TestamentosCollection(Testamento::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Testamento::create($request->all())) {
            return response()->json([
                'message' => 'Testamento cadastrado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Testamento cadastrado com erro'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function show($testamento)
    {
        if($testamento = Testamento::find($testamento)->first()) {
            return new TestamentoResource($testamento);
        } else {
            return response([
                "message" => "Erro ao encontrar testamento"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $testamento)
    {
        $testamento_obj = Testamento::find($testamento);
        $testamento_obj->fill($request->all());
     
        if($testamento_obj->save()) {
            return response()->json([
                'message' => 'Testamento atualizado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao atualizar testamento'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($testamento)
    {
        if(Testamento::destroy($testamento)) {
            return response()->json([
                'message' => 'Testamento apagado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao apagar'
            ], 404);
        }
    }
}
