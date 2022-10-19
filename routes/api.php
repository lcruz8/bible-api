<?php

use App\Http\Controllers\TestamentoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\VersiculoController;
use App\Http\Controllers\AuthController;
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
// Route::get('/testamento', [App\Http\Controllers\TestamentoController::class , 'index'])->name('testamento.index');
// Route::get('/testamento/{id}', [App\Http\Controllers\TestamentoController::class , 'show'])->name('testamento.detalhar');
// Route::post('/testamento', [App\Http\Controllers\TestamentoController::class , 'store'])->name('testamento.cadastrar');
// Route::put('/testamento/{id}', [App\Http\Controllers\TestamentoController::class , 'update'])->name('testamento.atualizar');
// Route::delete('/testamento/{id}', [App\Http\Controllers\TestamentoController::class , 'destroy'])->name('testamento.apagar');

// Route::get('/livro', [App\Http\Controllers\LivroController::class , 'index'])->name('livro.index');
// Route::get('/livro/{id}', [App\Http\Controllers\LivroController::class , 'show'])->name('livro.detalhar');
// Route::post('/livro', [App\Http\Controllers\LivroController::class , 'store'])->name('livro.cadastrar');
// Route::put('/livro/{id}', [App\Http\Controllers\LivroController::class , 'update'])->name('livro.atualizar');
// Route::delete('/livro/{id}', [App\Http\Controllers\LivroController::class , 'destroy'])->name('livro.apagar');


// Route::get('/versiculo', [App\Http\Controllers\VersiculoController::class , 'index'])->name('versiculo.index');
// Route::get('/versiculo/{id}', [App\Http\Controllers\VersiculoController::class , 'show'])->name('versiculo.detalhar');
// Route::post('/versiculo', [App\Http\Controllers\VersiculoController::class , 'store'])->name('versiculo.cadastrar');
// Route::put('/versiculo/{id}', [App\Http\Controllers\VersiculoController::class , 'update'])->name('versiculo.atualizar');
// Route::delete('/versiculo/{id}', [App\Http\Controllers\VersiculoController::class , 'destroy'])->name('versiculo.apagar');

// Route::apiResource('testamento', TestamentoController::class);
// Route::apiResource('livro', LivroController::class);
// Route::apiResource('versiculo', VersiculoController::class);


//PROTEGE AS ROTAS POR AUTENTICAÇÃO E REGISTRO
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResources([
        'testamento' => TestamentoController::class,
        'livro' => LivroController::class,
        'versiculo' => VersiculoController::class
    ]);
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
