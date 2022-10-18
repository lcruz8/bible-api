<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
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
        return Livro::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $livro_obj = new Livro();
        $livro_obj->fill($request->all());
        $livro_obj->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function show($livro)
    {
        return Livro::find($livro);

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
        if(!$livro_obj->save()) 
            App::abort(500, 'Erro ao salvar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy($livro)
    {
        Livro::destroy($livro);
    }
}
