<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    public function login(){
        $credenciales = request()->only('email', 'password');

        if (Auth::attempt($credenciales, \request()->filled('remember'))) {
            request()->session()->regenerate();
            return to_route('home');
        } else {
            throw ValidationException::withMessages([
                'error' => __('auth.failed')
            ]);
        }
    }
    public function logout(){
        Session::flush();
        \request()->session()->invalidate();
        \request()->session()->regenerateToken();
        Auth::logout();
        return \to_route('home');
    }
    public function registrer(){
        \request()->validate([
            'password'=>'min:8|required',
            'password1'=>'min:8|required',
            'name'=>'required',
            'email'=>'required'
        ]);
        $arr=User::where('email', '=', \request()->email)->get();
        if(\sizeof($arr)==1){
            throw ValidationException::withMessages([
                'email'=>'El email ya está registrado',
            ]);
        }
        if(\request()->password!=\request()->password1){
            throw ValidationException::withMessages([
                'password1'=>'La contraseña debe ser igual',
            ]);
        }
        $user = new User();
        $user->name= \request()->name;
        $user->email= \request()->email;
        $hash = Hash::make(\request()->password);
        $user->password= $hash;
        $user->save();
        $credenciales = request()->only('email', 'password');
        Auth::attempt($credenciales);
        return to_route('home');
    }
}
