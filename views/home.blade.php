@extends('layouts.plantilla')

@section('titulo','Home')



@section('contenido')
    
    <p style="color: aliceblue">Hola bienvenido @auth {{auth()->user()->name}} @endauth</p>
@endsection