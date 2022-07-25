<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    public function show()
    {
        $fav = Favorito::where('user_id','=', Auth::user()->id)->get();

        return \view('mostrar.favoritos', \compact('fav'));
    }
}
