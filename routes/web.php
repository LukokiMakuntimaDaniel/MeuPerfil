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

Route::get('/', function () {
    return view('index');
});



Route::prefix("usuario")->group(function(){
    Route::post('/salvar', [UsuarioController::class, 'store'])->name("usuario.store");
    Route::get('/', [UsuarioController::class, 'index']);
    Route::put('/actualizar', [UsuarioController::class, 'update'])->name("usuario.salvar");
    Route::delete('deletar/{id}', [UsuarioController::class, 'destroy'])->name("usuario.deletar");;
});


