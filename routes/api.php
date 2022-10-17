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


Route::get('/livro/listar', [App\Http\Controllers\LivroController::class , 'index'])->name('livro.index');
Route::get('/livro/{id}', [App\Http\Controllers\LivroController::class , 'show'])->name('livro.detalhar');
Route::post('/livro/cadastrar', [App\Http\Controllers\LivroController::class , 'store'])->name('livro.cadastrar');
Route::put('/livro/atualizar/{id}', [App\Http\Controllers\LivroController::class , 'update'])->name('livro.atualizar');
Route::delete('/livro/apagar/{id}', [App\Http\Controllers\LivroController::class , 'destroy'])->name('livro.apagar');


Route::get('/versiculo/listar', [App\Http\Controllers\VersiculoController::class , 'index'])->name('versiculo.index');
Route::get('/versiculo/{id}', [App\Http\Controllers\VersiculoController::class , 'show'])->name('versiculo.detalhar');
Route::post('/versiculo/cadastrar', [App\Http\Controllers\VersiculoController::class , 'store'])->name('versiculo.cadastrar');
Route::put('/versiculo/atualizar/{id}', [App\Http\Controllers\VersiculoController::class , 'update'])->name('versiculo.atualizar');
Route::delete('/versiculo/apagar/{id}', [App\Http\Controllers\VersiculoController::class , 'destroy'])->name('versiculo.apagar');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
