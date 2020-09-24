<!doctype html>
<html lang="{{ app()->getLocale() }}"><!-- CAMBIAR A ESPAÑOL -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MusicTagger</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <style>
        html,
        body {
            background-color: black;
            color: white;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 0px 50px;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .cabecera {
            height: 60px;
        }

    </style>
</head>

<body>
    <!-- CABECERA -->
    <div class="cabecera">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                    <a href="{{ route('register') }}">Registrarse</a>
                @endauth
            </div>
        @endif
    </div>
    <!-- FIN CABECERA -->

    <!-- CONTENIDO -->
    <div class="container-fluid">
        <div class="card" style="width: 50%;">
            <img class="card-img-top" src="{{ asset('images/welcome-calificar.jpeg') }}" alt="Card image cap">
            <div class="card-body ">
                <p class="card-text "><strong>Califica tus canciones</strong>
                </p>
            </div>
        </div>
        <br>
        <div class="card" style="width: 50%;">
            <img class="card-img-top" src="{{ asset('images/welcome-listacanciones.png') }}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text"><strong>Has lista de tus canciones favoritas</strong>
                </p>
            </div>
        </div>
    </div><!-- fin container-fluid -->
    <!-- FIN CONTENIDO -->

    <!-- FOOTER -->
    <div class="card-footer">
        @include('layouts.footer')
    </div>
    <!-- FIN FOOTER -->
</body>

</html>
