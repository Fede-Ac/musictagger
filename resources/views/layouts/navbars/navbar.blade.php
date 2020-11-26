<nav class="navbar navbar-dark bg-dark navbar-expand-md">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'MusicTagger') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Etiquetas <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/etiqueta/index') }}">Agregar etiqueta</a>
                        <a class="dropdown-item" href="{{ url('/etiqueta/ver/7') }}">Mostrar etiqueta</a>
                        <a class="dropdown-item" href="{{ url('/etiqueta/modificar/7') }}">Modificar etiqueta</a>
                        <a class="dropdown-item" href="{{ url('/etiqueta/eliminar/7') }}">Eliminar etiqueta</a>
                    </div>
                </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            canciones <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/canciones/crear') }}">Agregar canción</a>
                            <a class="dropdown-item" href="{{ url('/canciones/ver/7') }}">Mostrar Canción</a>
                            <a class="dropdown-item" href="{{ url('/canciones/modificar/7') }}">Modificar canción</a>
                            <a class="dropdown-item" href="{{ url('/canciones/eliminar/7') }}">Eliminar canción</a>
                        </div>
                    </li>
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <!--a class="navbar-brand brand-logo" href="index-2.html"><img src="/melody/images/logo.svg" alt="logo"/></a>-->
                        <a class="navbar-brand brand-logo-mini"
                            href="{{ url('/usuarios/ver/' . Auth::user()->idUsuario) }}"><img src="" alt="..." class="rounded-circle"></a>
                    </div>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nombre }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/usuarios/ver/' . Auth::user()->idUsuario) }}">Mostrar
                                usuario</a>
                            <a class="dropdown-item"
                                href="{{ url('/usuarios/modificar/' . Auth::user()->idUsuario) }}">Modificar usuario</a>
                            <a class="dropdown-item"
                                href="{{ url('/usuarios/borrar/' . Auth::user()->idUsuario) }}">Eliminar usuario</a>
                            <a class="dropdown-item" href="">Ajustes</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>
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
