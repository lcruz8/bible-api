<?php

namespace App\Http\Controllers;

use App\Models\Versao;
use Illuminate\Http\Request;
use App\Http\Resources\VersoesCollection;
use App\Http\Resources\VersaoResource;

class VersaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new VersoesCollection(Versao::select('id', 'nome', 'abreviacao')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Versao::create($request->all())) {
            return response()->json([
                'message' => 'Versao cadastrado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao cadastrar versao'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $versao
     * @return \Illuminate\Http\Response
     */
    public function show($versao)
    {
        if($versao = Versao::with('idiomas', 'livros')->find($versao)) {
            return new VersaoResource($versao);
        } else {
            return response([
                "message" => "Erro ao encontrar versao"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $Versao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $versao)
    {
        $versao_obj = Versao::find($versao);
        $versao_obj->fill($request->all());

        if($versao_obj->save()) {
            return response()->json([
                'message' => 'Versao atualizado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao atualizar versao'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $Versao
     * @return \Illuminate\Http\Response
     */
    public function destroy($versao)
    {
        if(Versao::destroy($versao)) {
            return response()->json([
                'message' => 'Versao apagado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao apagar'
            ], 404);
        }
    }
}
