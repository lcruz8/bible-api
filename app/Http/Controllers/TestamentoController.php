<?php

namespace App\Http\Controllers;

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
        return Testamento::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testamento_obj = new Testamento();
        $testamento_obj->fill($request->all());
        $testamento_obj->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function show($testamento)
    {
        return Testamento::find($testamento);
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
        if(!$testamento_obj->save()) 
            App::abort(500, 'Erro ao salvar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($testamento)
    {
        Testamento::destroy($testamento);
    }
}
