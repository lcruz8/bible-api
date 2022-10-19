<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idioma;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Idioma::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Idioma::create($request->all())) {
            return response()->json([
                'message' => 'Idioma cadastrado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao cadastrar idioma'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idioma
     * @return \Illuminate\Http\Response
     */
    public function show($idioma)
    {
        if($idioma = Idioma::find($idioma)->first()) {
            return response([
                "idioma" => $idioma,
                "versiculos" => $idioma->versiculos,
            ], 201);
        } else {
            return response([
                "message" => "Erro ao encontrar idioma"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idioma)
    {
        $idioma_obj = Idioma::find($idioma);
        $idioma_obj->fill($request->all());

        if($idioma_obj->save()) {
            return response()->json([
                'message' => 'Idioma atualizado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao atualizar idioma'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idioma
     * @return \Illuminate\Http\Response
     */
    public function destroy($idioma)
    {
        if(Idioma::destroy($idioma)) {
            return response()->json([
                'message' => 'Idioma apagado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao apagar'
            ], 404);
        }
    }
}
