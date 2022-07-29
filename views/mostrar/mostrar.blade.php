
<!--
    Link de los iconos 
    <a href="https://www.flaticon.es/iconos-gratis/favorito" title="favorito iconos">Favorito iconos creados por Aldo Cervantes - Flaticon</a> 
-->
@extends('layouts.plantilla')

@section('titulo',$con['nombre'])
    
@section('contenido')
    <link rel="stylesheet" href="{{asset('css/sec.css')}}">
    <div class="sec">
        @php
            $con['nombre'] = str_replace(' ', '%20', $con['nombre']);
            $url = 'https://genshin-app-api.herokuapp.com/api/'.$con['tipo'].'/'.'info/'.$con['nombre'];
            $json = file_get_contents($url);
            $data = json_decode($json, true);
            //echo $data['payload']['character']['name'];
        @endphp
        
        @switch($con['tipo'])
            @case('characters')
                @php $d=$data['payload']['character']; @endphp
                <div class="im"><img src="{{$d['cardImageURL']}}" width="200"></div>
                <div class="con">
                    @auth <a href="{{ route($es?'consulta.eliminar':'consulta.agregar', ['tipo'=>$con['tipo'],'nombre'=>$con['nombre']]) }}"><img src="{{asset(!$es?'img/favorito.png':'img/favorito(1).png')}}" width="30"></a> @endauth
                    <p>Name: {{$d['name']}}</p>
                    <p>Description: {{$d['description']}}</p>
                    <p>Element: {{$d['element']}}</p>
                    <p>Weapon Type: {{$d['weaponType']}}</p>
                    <p>Birthday: {{$d['birthday']}}</p>
                    <p>Nation: {{$d['nation']}}</p>
                    <p>Rarity: {{$d['rarity']}}</p>
                </div>
                @break
            @case('weapons')
                @php $d=$data['payload']['weapon']; @endphp
                <div class="im"><img src="{{$d['originalIconUrl']}}" width="200"></div>
                <div class="con">
                    @auth <a href="{{ route($es?'consulta.eliminar':'consulta.agregar', ['tipo'=>$con['tipo'],'nombre'=>$con['nombre']]) }}"><img src="{{asset(!$es?'img/favorito.png':'img/favorito(1).png')}}" width="30"></a> @endauth
                    <p>Name: {{$d['name']}}</p>
                    <p>Description: {{$d['description']}}</p>
                    <p>Weapon Type: {{$d['weaponType']}}</p>
                    <p>Rarity: {{$d['rarity']}}</p>
                </div>
                @break
            @case('enemies')
                @php $d=$data['payload']['enemy']; @endphp
                <div class="im"><img src="{{$d['iconUrl']}}" width="200"></div>
                <div class="con">
                    @auth <a href="{{ route($es?'consulta.eliminar':'consulta.agregar', ['tipo'=>$con['tipo'],'nombre'=>$con['nombre']]) }}"><img src="{{asset(!$es?'img/favorito.png':'img/favorito(1).png')}}" width="30"></a> @endauth
                    <p>Name: {{$d['name']}}</p>
                    <p>Description: {{$d['description']}}</p>
                    <p>Family: {{$d['family']}}</p>
                </div>
                @break
        @endswitch
    </div>
@endsection