
@extends('layouts.plantilla')

@section('titulo','Consultar')
    
@section('contenido')
@error('error')
    <script>
        alert('Ingresa una opcion valida')
    </script>
@enderror
    <link rel="stylesheet" href="{{asset('css/select.css')}}">
    <div class="content-select">
        <form action="{{ route('consulta.show') }}" method="get" name="form1" >
            <select name="tipo" id="" onchange="checkUpdate(this.value)">
                <option value="0" >Selecciona</option>
                <option value="characters">Personaje</option>
                <option value="weapons">Arma</option>
                <option value="enemies">Enemigo</option>
            </select>
            <select name="nombre" id="" onchange="mostrar(this.value)">
                <option value="-">-</option>
            </select>
            <script src="{{asset('js/special.js')}}"></script>
            <button type="submit" class="btn-bonito">Consultar</button>
        </form>
        <br>
        <div class="container">
        </div>
    </div>
    
@endsection