<?php

namespace App\Http\Controllers;

use App\Models\Traducao;
use Illuminate\Http\Request;

class TraducaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Traducao::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Traducao::create($request->all())) {
            return response()->json([
                'message' => 'Traducao cadastrado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao cadastrar traducao'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $traducao
     * @return \Illuminate\Http\Response
     */
    public function show($traducao)
    {
        if($traducao = Traducao::find($traducao)->first()) {
            return response([
                "traducao" => $traducao,
                "versiculos" => $traducao->versiculos,
            ], 201);
        } else {
            return response([
                "message" => "Erro ao encontrar traducao"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $traducao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $traducao)
    {
        $traducao_obj = Traducao::find($traducao);
        $traducao_obj->fill($request->all());

        if($traducao_obj->save()) {
            return response()->json([
                'message' => 'Traducao atualizado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao atualizar traducao'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $traducao
     * @return \Illuminate\Http\Response
     */
    public function destroy($traducao)
    {
        if(Traducao::destroy($traducao)) {
            return response()->json([
                'message' => 'Traducao apagado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao apagar'
            ], 404);
        }
    }
}
