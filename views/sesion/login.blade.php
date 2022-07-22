@extends('layouts.plantilla')

@section('titulo','Login')
    
@section('contenido')
    Hola bienvenido a login =D
    @error('error')
    <br>
        {{$message}}
        <br>
    @enderror
    <form action="{{ route('user.login') }}" method="POST">
        @csrf
        <label >
        <input class="form-control" autofocus required type="email" name="email" placeholder="Correo:" value="{{old('email')}}">
        </label>
        <br>
        @error('email') <small>{{ $message }}</small> <br> @enderror
        
        <label >
            <input type="password" name="password" required placeholder="Contraseña: ">
        </label>
        <br>
        @error('password') <small>{{ $message }}</small><br>  @enderror
        
        <label >
            <input type="checkbox" name="remember">
            Recuerda mi sesion
        </label>
        <br>
        <button type="submit">Ingresar</button>
    </form>
@endsection