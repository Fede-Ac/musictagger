<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MusicTagger') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        html,
        body {
            background-color: black;       
            font-family: 'Verdana', sans-serif;
        }
    </style>
</head>
<body>
    <div class="bg-dark"> 
              
        @include('layouts.navbars.navbar')<!--barra superior-->
        <main class="py-4">       
            <div class="main-panel">
                <div class="content">
                    @yield('content')<!-- contenido -->
                </div>                               
            </div>
        </main>
        <div class="panel-footer text-white">
            @include('layouts.footer')<!-- pie de pagina -->
        </div>
    </div>
</body>
</html>