<header>
    <input type="checkbox" id="btn-menu">
    <label for="btn-menu"><img src="{{asset('img/menu.png')}}" width="30px"/></label>
    <nav class="menu">
        <ul>
            <li><a href="{{ route('home') }}" class="{{request()->routeIs('home') ? 'active' : ''}}">Inicio</a></li>
            <li><a href="{{ route('favorito.show') }}">Favoritos</a></li>
            <li><a href="{{ route('consulta') }}">Consultar</a></li>
            @auth
    
            <li><form action="{{ route('user.logout') }}" method="POST" style="display: inline" ">
                @csrf
                <a href="#" onclick="this.closest('form').submit()">Logout</a>
                </form></li>
            <!--<a href="{{-- route('logout') --}}">Logout</a>-->
    
            @else
            <li><a href="{{ route('registrer') }}" class="{{request()->routeIs('registrer') ? 'active' : ''}}">Registrer</a></li>
            <li><a href="{{ route('login') }}" class="{{request()->routeIs('login') ? 'active' : ''}}">Login</a></li>
            @endauth
    
        </ul>
    </nav>
</header>