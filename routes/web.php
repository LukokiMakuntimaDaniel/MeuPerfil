<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/', [UsuarioController::class, 'index']);



Route::prefix("usuario")->group(function(){
    Route::post('/salvar', [UsuarioController::class, 'store'])->name("usuario.salvar");
    Route::get('/', [UsuarioController::class, 'index']);
    Route::put('/actualizar/{id}', [UsuarioController::class, 'update'])->name("usuario.actualizar");
    Route::delete('deletar/{id}', [UsuarioController::class, 'destroy'])->name("usuario.deletar");;
});


