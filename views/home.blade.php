@extends('layouts.plantilla')

@section('titulo','Home')


<a href="{{ route('home') }}">Inicio</a>
@section('contenido')
    @auth
    
    <form action="{{ route('user.logout') }}" method="POST" style="display: inline">
        @csrf
        <a href="#" onclick="this.closest('form').submit()">Logout</a>
    </form>
    <!--<a href="{{-- route('logout') --}}">Logout</a>-->
    
    @else
    <a href="{{ route('regitrer') }}">Registrer</a>
    <a href="{{ route('login') }}">Login</a>
    @endauth
    <br>
    Hola bienvenido a home =D
@endsection