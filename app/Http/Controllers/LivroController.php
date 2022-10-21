<?php

namespace App\Http\Controllers;

use App\Http\Resources\LivroResource;
use Illuminate\Http\Request;
use App\Models\Livro;
use App\Http\Resources\LivrosCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LivrosCollection(Livro::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = !empty($request->capa) ? $request->capa->store('capa_livro', 'public') : null;
        
        $livro = (new Livro())->fill($request->all());
        $livro->capa = $path;
        
        if($livro->save()) {
            return response()->json([
                'message' => 'Livro cadastrado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao cadastrar livro'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function show($livro)
    {

        $livro = Livro::with('versoes', 'testamentos', 'versiculos')->find($livro);
        if(!empty($livro)) {
            return new LivroResource($livro);
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
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $livro)
    {
        $livro_obj = Livro::find($livro);
        $livro_obj->fill($request->all());

        if($livro_obj->save()) {
            return response()->json([
                'message' => 'Livro atualizado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao atualizar livro'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy($livro)
    {
        if(Livro::destroy($livro)) {
            return response()->json([
                'message' => 'Livro apagado com sucesso'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Erro ao apagar'
            ], 404);
        }
    }
}
