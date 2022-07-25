@extends('layouts.plantilla')
@section('titulo','Mis favoritos')
    
@section('contenido')
        @foreach ($fav as $it)
            @php
                switch ($it['tipo']) {
                    case 'personaje':
                        $url ='https://genshin-app-api.herokuapp.com/api/characters/info/'.$it['nombre'].'?infoDataSize=minimal';
                        break;
                    
                    case 'arma':
                        $it['nombre']= str_replace(" ", "%20", $it['nombre']);
                        $url ='https://genshin-app-api.herokuapp.com/api/weapons/info/'.$it['nombre'].'?infoDataSize=minimal';
                        break;
                    case 'enemigo':
                        $it['nombre']= str_replace(" ", "%20", $it['nombre']);
                        $url= 'https://genshin-app-api.herokuapp.com/api/enemies/info/'.$it['nombre'];
                        break;
                }
                $json = file_get_contents($url);
                $datos = json_decode($json, true);
            @endphp
            <div>
                <img src="@php
                    switch ($it['tipo']) {
                        case 'personaje':
                            echo $datos['payload']['character']['cardImageURL'];
                            break;
                        case 'arma':
                            echo $datos['payload']['weapon']['originalIconUrl'];
                            break;
                        case 'enemigo':
                            echo $datos['payload']['enemy']['iconUrl'];
                            break;
                    }
                @endphp" width="200">

                </div>
        @endforeach

@endsection