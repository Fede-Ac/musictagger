@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-14">
            <!-- CAROUSEL -->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-30 mx-auto" src="{{ asset('images/not-found-image.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-30 mx-auto" src="{{ asset('images/not-found-image.jpg') }}"
                            alt="Second slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previa</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
            <!-- END CAROUSEL -->

            <!-- TABLE -->
            <div class="card text-white bg-dark">
                <div class="card-header">
                    Tus listas de reproducción
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-dark">
                        <caption class="invisible">Tabla de listas de reproducción</caption><!--Subtitulos-->
                        
                        <thead>
                            <tr>
                                <th scope="col">idUsuario</th>
                                <th scope="col">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listasReproduccion as $listaReproduccion)
                                <tr>
                                    <td>{{ $listaReproduccion->idUsuario }}</td>
                                    <td>{{ $listaReproduccion->descripcion }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                    {{ $listasReproduccion->links() }}
                    
                </div>
            </div>
            <!-- END TABLE -->

            <!-- LISTAS POPULARES -->
            <div class="card text-white bg-dark">
                <div class="card-header">
                    Listas de reproducción populares
                </div>
                <div class="card-body">
                    <!--hacer que si son mas de X se muestra una flecha-->
                        <img class="p-2" src="{{ asset('images/not-found-image.jpg') }}" />
                        <img class="p-2" src="{{ asset('images/not-found-image.jpg') }}" />
                        <img class="p-2" src="{{ asset('images/not-found-image.jpg') }}" />
                        <img class="p-2" src="{{ asset('images/not-found-image.jpg') }}" />
                        <img class="p-2" src="{{ asset('images/not-found-image.jpg') }}" />
                    
                </div>
            </div>
            <!-- FIN LISTAS POPULARES -->

            <!-- ETIQUETAS POPULARES -->
            <div class="card text-white bg-dark">
                <div class="card-header">
                    Etiquetas populares
                </div>

                <div class="card-body">
                    @foreach ($etiquetas as $etiqueta)
                        <a href="https://google.com" class="badge badge-dark">
                            <button type="button" class="btn btn-dark">{{ $etiqueta->descripcion }}</button>
                        </a>
                    @endforeach
                </div>
            </div>
            <!-- FIN ETIQUETAS POPULARES -->

            <!-- ETIQUETAS POPULARES -->
            <div class="card text-white bg-dark">
                <div class="card-header">
                    Generos populares
                </div>

                <div class="card-body">
                    @foreach ($generos as $genero)
                        <a href="https://google.com" class="badge badge-dark">
                            <button type="button" class="btn btn-dark">{{ $genero->descripcion }}</button>
                        </a>
                    @endforeach
                </div>
            </div>
            <!-- FIN ETIQUETAS POPULARES -->

            <!-- CANCIONES ALEATORIAS -->
            <div class="card text-white bg-dark">
                <div class="card-header">
                    Canciones aleatorias
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-dark">
                        <caption class="invisible">Lista de canciones</caption><!--Subtitulos-->
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>                                
                                <th scope="col">link del video</th>
                                <th scope="col">link de Spotify</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($canciones as $cancion)
                                <tr>
                                    <td>
                                        <button type="link" class="btn btn-link" data-toggle="modal"
                                            data-target=".bd-modal-lg">{{ $cancion->titulo }}</button>
                                        <!-- Modal  ERROR --> 
                                        <div class="modal fade bd-modal-lg text-dark" tabindex="-1" role="dialog"
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Mas información
                                                            de
                                                            {{ $cancion->titulo }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Título: {{ $cancion->titulo }}<br>
                                                        Ver letra en: <a class="nav-link"
                                                            href="https://www.musica.com/">{{ $cancion->linkLetra }}</a>
                                                        Ver video en:<br> <iframe width="560" height="315"
                                                            src="https://www.youtube.com/embed/{{ substr($cancion->linkVideo, -11) }}?controls=0"
                                                            frameborder="0"
                                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen></iframe><br>
                                                        escuchar canción en: <a class="nav-link"
                                                            href="{{ $cancion->linkSpotify }}"> {{ $cancion->linkSpotify }}</a>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar</button>
                                                      <a href="{{ url('/canciones/ver/' . $cancion->IDcancion) }}"><button
                                                            type="botton" class="btn btn-primary"
                                                                >Ver mas detalles</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- fin Modal -->
                                    </td>                                    
                                    <td>{{ substr($cancion->linkVideo, 8, 26) . "..." }}</td>
                                    <td>{{ substr($cancion->linkSpotify, 8, 26) . "..." }}</td>
                                    <td><a href="{{ url('/canciones/ver/' . $cancion->IDcancion) }}"><button type="button"
                                                class="btn btn-primary" data-dismiss="modal">Mas detalles</button></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $canciones->links() }}
                    </div>
                </div>

            </div>
            <!-- FIN CANCIONES ALEATORIAS -->
            </div>
        </div>
    </div>
@endsection
