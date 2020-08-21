<nav class="navbar navbar-dark bg-dark navbar-expand-md">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'MusicTagger') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                    </li>
                @else
                <div class="photo">
                    <img src="img/anime3.png">
                </div>                
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nombre }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('usuarios.show', Auth::user()->idUsuario) }}">Mostrar usuario</a>
                            <a class="dropdown-item" href="{{ route('usuarios.edit', Auth::user()->idUsuario) }}">Modificar usuario</a>
                            <a class="dropdown-item" href="{{ route('usuarios.delete', Auth::user()->idUsuario) }}">Eliminar usuario</a>
                            <a class="dropdown-item" href="">Ajustes</a>
                            
                            <a class="dropdown-divider"></a> <!-- no anda la barra divisoria -->

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>                                  
                        </div>                            
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
