<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
    })->name('home');
Route::view('login', 'sesion.login')->name('login')->middleware('guest');
Route::view('registrer', 'sesion.registrer')->name('registrer')->middleware('guest');
Route::controller(UsuarioController::class)->group(function () {
    Route::post('login', 'login')->name('user.login');
    Route::post('logout', 'logout')->name('user.logout');
    Route::post('registrer', 'registrer')->name('user.registrer');
    });
Route::controller(FavoritoController::class)->group(function(){
    Route::get('favoritos', 'show')->name('favorito.show')->middleware('auth');
    Route::get('favoritos/{fav}/eliminar', 'eliminar')->name('favorito.eliminar')->middleware('auth');
    });

Route::controller(ConsultaController::class)->group(function(){
    Route::get('consulta', 'index')->name('consulta');
    Route::get('consulta/mostrar', 'show')->name('consulta.show');
    Route::get('consulta/{tipo}/{nombre}/a', 'agregar')->name('consulta.agregar')->middleware('auth');
    Route::get('consulta/{tipo}/{nombre}', 'eliminar')->name('consulta.eliminar')->middleware('auth');
    });