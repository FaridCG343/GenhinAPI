<?php

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
Route::post('login', [UsuarioController::class, 'login'])->name('user.login');
Route::post('logout',[UsuarioController::class, 'logout'])->name('user.logout');
Route::view('registrer', 'sesion.registrer')->name('regitrer')->middleware('guest');
Route::post('registrer', [UsuarioController::class, 'registrer'])->name('user.registrer');