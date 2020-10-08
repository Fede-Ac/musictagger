<!doctype html>
<html lang="{{ app()->getLocale() }}">
<!-- CAMBIAR A ESPAÑOL -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon.ico -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />

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
        .alto{
        height: 180px;
      }
      .flex-container {
            display: flex;
            justify-content: center;
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
    <div class="container alto">
        <div class="row">
      <div class="col-md-4">
          <img class="img-fluid" src="images/logochico.jpg" />
      </div>
        </div>
   </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
            <div class="card" style="width: 500px;">
                <div class="card-body">
                  <h1 class="card-title">Etiqueta y califica tus canciones</h1>
                  <h3 class="card-text">Elige tu propio contenido y disfruta de la experiencia </h3>
                </div>  
                </div>
              </div>
              
                            
            </div>
    </div>

    
          
        <div class="flex-container">
            <div class="row">
          <img src="images/artistas.jpg" class="rounded mx-auto d-block" alt="...">
        </div> 
    </div>  

    <br>
    <div class="card" style="width: 50%;">
        <img class="card-img-top" src="{{ asset('images/welcome-listacanciones.png') }}" alt="Card image cap">
        <div class="card-body">
            <h1 class="card-title">Crea tu propia playlist</h1>
                  <h3 class="card-text">Mezcla tus canciones favoritas</h3>
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
