<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ConsultaController extends Controller
{
    public function index()
    {
        return view('mostrar.consultar');;
    }
    public function show()
    {
        $con = request()->all();
        if (request('tipo') == '0' || request('nombre') == '-') {
            throw ValidationException::withMessages([
                'error' => 'Selecciona una opcion valida'
            ]);
        }
        if (Auth::check()) {
            $es = sizeof(Favorito::where('nombre', '=', request('nombre'))->get()) != 0;
            return view('mostrar.mostrar', compact('con'), compact('es'));
        } else {
            return view('mostrar.mostrar', compact('con'));
        }
    }
    public function agregar($tipo, $nombre)
    {
        $es = 1;
        if (sizeof(Favorito::where('nombre', '=', request('nombre'))->get()) == 0) {
            $con = array('tipo' => $tipo, 'nombre' => $nombre);
            $fav = new Favorito();
            $fav->tipo = $tipo;
            $fav->nombre = $nombre;
            $fav->user_id = Auth::user()->id;
            $fav->save();
        }
        return view('mostrar.mostrar', compact('con'), compact('es'));
    }
    public function eliminar($tipo, $nombre)
    {
        $es = 0;
        $con = array('tipo' => $tipo, 'nombre' => $nombre);
        Favorito::where('nombre', $nombre)->where('user_id', Auth::user()->id)->delete();
        return view('mostrar.mostrar', compact('con'), compact('es'));
    }
}
