<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/testamento/listar', [App\Http\Controllers\TestamentoController::class , 'index'])->name('testamento.index');
Route::get('/testamento/{id}', [App\Http\Controllers\TestamentoController::class , 'show'])->name('testamento.detalhar');
Route::post('/testamento/cadastrar', [App\Http\Controllers\TestamentoController::class , 'store'])->name('testamento.cadastrar');
Route::put('/testamento/atualizar/{id}', [App\Http\Controllers\TestamentoController::class , 'update'])->name('testamento.atualizar');
Route::delete('/testamento/apagar/{id}', [App\Http\Controllers\TestamentoController::class , 'destroy'])->name('testamento.apagar');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
