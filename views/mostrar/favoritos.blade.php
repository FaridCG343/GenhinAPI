@extends('layouts.plantilla')
@section('titulo','Mis favoritos')
    
@section('contenido')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/sec.css')}}">
    @if (sizeof($fav)==0)
        <p>No tienes favoritos, <a href="">Haz click aqui</a> para agregar uno</p>
    @endif
    @foreach ($fav as $it)
        @php
            $it['nombre'] = str_replace(' ', '%20', $it['nombre']);
            $url ='https://genshin-app-api.herokuapp.com/api/'.$it['tipo'].'/'.'info/'.$it['nombre'];
            $json = file_get_contents($url);
            $data = json_decode($json, true);
        @endphp
        <div class="sec">
            @switch($it['tipo'])
            @case('characters')
                @php $d=$data['payload']['character']; @endphp
                <img src="{{$d['cardImageURL']}}" width="200">
                <div class="con">
                    <a href="{{ route('favorito.eliminar', ['fav'=>$it]) }}"><img src="{{asset('img/favorito(1).png')}}" width="30"></a>
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
                <img src="{{$d['originalIconUrl']}}" width="200">
                <div class="com">
                    <a href="{{ route('favorito.eliminar', ['fav'=>$it]) }}"><img src="{{asset('img/favorito(1).png')}}" width="30"></a>
                    <p>Name: {{$d['name']}}</p>
                    <p>Description: {{$d['description']}}</p>
                    <p>Weapon Type: {{$d['weaponType']}}</p>
                    <p>Rarity: {{$d['rarity']}}</p>
                </div>
                @break
            @case('enemies')
                @php $d=$data['payload']['enemy']; @endphp
                <img src="{{$d['iconUrl']}}" width="200">
                <div class="con">
                    <a href="{{ route('favorito.eliminar', ['fav'=>$it]) }}"><img src="{{asset('img/favorito(1).png')}}" width="30"></a>
                    <p>Name: {{$d['name']}}</p>
                    <p>Description: {{$d['description']}}</p>
                    <p>Family: {{$d['family']}}</p>
                </div>
                @break
            @endswitch
        </div>
    @endforeach
    {{$fav->links()}}
@endsection