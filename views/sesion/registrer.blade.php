@extends('layouts.plantilla')

@section('titulo','registrer')

@section('contenido')
    <form action="{{ route('user.registrer') }}" method="post">
        @csrf
        <label >
            Usuario:
            <input type="text" name="name" id="" required value="{{old('name')}}">
        </label>
        @error('name')
            <small>{{$message}}</small>
        @enderror
        <br>
        <label >
            e-mail
            <input type="email" name="email" id="" required value="{{old('email')}}">
        </label>
        @error('email')
            <small>{{$message}}</small>
        @enderror
        <br>
        <label >
            Contraseña:
            <input type="password" name="password" id="" required>
        </label>
        @error('password')
            <small>{{$message}}</small>
        @enderror
        <br>
        <label >
            Confirmar contraseña:
            <input type="password" name="password1" id="" required>
        </label>
        @error('password1')
            <small>{{$message}}</small>
        @enderror
        <br>
        
        <button type="submit">Registrarse</button>
    </form>
@endsection