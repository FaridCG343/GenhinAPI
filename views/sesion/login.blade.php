@extends('layouts.plantilla')

@section('titulo','Login')
    
@section('contenido')
    @error('error')
        <br>
        {{$message}}
        <br>
    @enderror
    <form action="{{ route('user.login') }}" method="POST" class="form">
        @csrf
        <h2 class="titulo">Iniciar sesion</h2>
        <p class="parrafo">¿Aún no tienes una cuenta?<a href="{{ route('user.registrer') }}" class="link">Haz click aquí</a></p>
        <div class="form-container">
            <div class="form-group">
                <input id="email" class="form-input" autofocus required type="email" name="email" value="{{old('email')}}" placeholder=" ">
                <label for="email" class="form-label">E-mail:</label>
                <span class="form-line"></span>
                @error('email') <small>{{ $message }}</small> <br> @enderror
                
            </div>
            <div class="form-group">
                <input class="form-input" id="password" type="password" name="password" required placeholder=" ">
                <label for="password" class="form-label">Password</label>
                <span class="form-line"></span>
                @error('password') <small>{{ $message }}</small><br>  @enderror
                
            </div>
            <div class="form-group">
                <input id="reme" type="checkbox" name="remember" >
                <label for="reme" class="">Recuerda mi sesion</label>
            </div>
            <input type="submit" class="form-submit" value="Entrar">
        </div>
        
    </form>
@endsection