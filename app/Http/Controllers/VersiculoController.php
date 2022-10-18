<?php

namespace App\Http\Controllers;

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
        return Versiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $versiculo_obj = Versiculo::create($request->all());
        $versiculo_obj->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function show($versiculo)
    {
        return Versiculo::find($versiculo);
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
        if(!$versiculo_obj->save()) 
            App::abort(500, 'Erro ao salvar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($versiculo)
    {
        Versiculo::destroy($versiculo);
    }
}
