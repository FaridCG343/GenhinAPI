@extends('layouts.plantilla')

@section('titulo','registrer')
@section('contenido')
    <form action="{{ route('user.registrer') }}" method="POST" class="form">
        @csrf
        <h2 class="titulo">Registrarse</h2>
        <div class="form-container">
            <div class="form-group">
                <input class="form-input" type="text" name="name" id="name" required value="{{old('name')}}" placeholder=" ">
                <label for="name" class="form-label">Nombre</label>
                @error('name') <small>{{$message}}</small> @enderror
                <span class="form-line"></span>
            </div>
            <div class="form-group">
                <input class="form-input" type="email" name="email" id="email" required value="{{old('name')}}" placeholder=" ">
                <label for="email" class="form-label">e-mail</label>
                @error('email') <small>{{$message}}</small> @enderror
                <span class="form-line"></span>
            </div>
            <div class="form-group">
                <input class="form-input" type="password" name="password" id="password" required value="{{old('name')}}" placeholder=" ">
                <label for="password" class="form-label">Contraseña</label>
                @error('password') <small>{{$message}}</small> @enderror
                <span class="form-line"></span>
            </div>
            <div class="form-group">
                <input class="form-input" type="password" name="password1" id="password1" required value="{{old('name')}}" placeholder=" ">
                <label for="password1" class="form-label">Confirmar Contraseña</label>
                @error('password') <small>{{$message}}</small> @enderror
                <span class="form-line"></span>
            </div>
            <input type="submit" value="Registrarse" class="form-submit">
        </div>
        
        
    </form>
@endsection