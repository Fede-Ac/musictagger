@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card ">

                    <!-- INFORMACIÓN BÁSICA -->
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('images/not-found-image.jpg') }}" alt="Carátula" class="img-thumbnail ml"
                                style="width: 300px;">
                        </div>
                        <div class="col">
                            <ul class="list-group list-group-flush mr">
                                <li class="list-group-item">Título {{ collect($cancion[0])->get('TITULO', 'Desconocido') }}
                                </li>
                                <li class="list-group-item">Artista {{ collect($cancion[0])->get('AUTOR', 'Desconocido') }}
                                </li>
                                <li class="list-group-item">Etiquetas <span
                                        class="badge badge-pill badge-secondary">{{ collect($cancion[0])->get('ETIQUETAS', 'Desconocido') }}</span>
                                </li>
                                <li class="list-group-item">Género {{ collect($cancion[0])->get('GENERO', 'Desconocido') }}
                                </li>
                                <li class="list-group-item">Calificación
                                    
                                    <a href="{{ url('/canciones/modificar/meGusta/1') }}"><span class="badge badge-pill badge-success">Me gusta
                                        {{ collect($cancion[0])->get('MEGUSTA', 'Desconocido') }}</span></a>
                                        <a href="{{ url('/canciones/modificar/noMeGusta/1') }}"><span class="badge badge-pill badge-danger">No me gusta
                                        {{ collect($cancion[0])->get('NOMEGUSTA', 'Desconocido') }}</span></a>

                                   
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--
                                        collect($cancion)->dump() muestra todo
                                        var_dump($cancion[0] muestra solo el array
                                        var_dump($cancion[0]->titulo) muestra el tipo de dato, la cantidad y el dato
                                        collect($cancion[0])->get('titulo') muestra solo el dato
                                        -->
                    <!-- FIN INFORMACIÓN BÁSICA -->

                    <!-- INFORMACIÓN ADICIONAL -->
                    <div class="dropdown-divider"></div>

                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">
                        Ver mas datos
                    </button>

                    <div class="collapse show" id="collapseExample">

                        <ul class="list-group list-group-flush mr">
                            <div class="row">
                                <div class="col">
                                    <li class="list-group-item">Álbum
                                        {{ collect($cancion[0])->get('ALBUM', 'Desconocido') }}
                                    </li>
                                    <li class="list-group-item">Discográfica
                                        {{ collect($cancion[0])->get('DISCOGRAFICA', 'Desconocido') }}</li>
                                    <li class="list-group-item">Año {{ collect($cancion[0])->get('AÑO', 'Desconocido') }}
                                    </li>
                                </div>
                                <div class="col">
                                    <li class="list-group-item">Letra <a
                                            href="{{ collect($cancion[0])->get('LETRA', 'Desconocido') }}">{{ collect($cancion[0])->get('LETRA', 'Desconocido') }}</a>
                                    </li>
                                    <li class="list-group-item">Video <a
                                            href="{{ collect($cancion[0])->get('VIDEO', 'Desconocido') }}">{{ collect($cancion[0])->get('VIDEO', 'Desconocido') }}
                                        </a></li>
                                    <li class="list-group-item">Música(solo audio) <a
                                            href="{{ collect($cancion[0])->get('MUSICA', 'Desconocido') }}">{{ collect($cancion[0])->get('MUSICA', 'Desconocido') }}</a>
                                    </li>
                                </div>
                            </div>
                        </ul>

                    </div>
                    <!-- FIN INFORMACIÓN ADICIONAL -->

                    <!-- RELACIONADOS -->
                    <div class="card-header">
                        Canciones relacionadas
                    </div>
                    <div id="carouselExampleIndicators" class="carousel slide text-white bg-dark" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-30 mx-auto" src="{{ asset('images/not-found-image.jpg') }}"
                                            alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-30 mx-auto" src="{{ asset('images/not-found-image.jpg') }}"
                                            alt="Second slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previa</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Siguiente</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- FIN RELACIONADOS -->
                </div>
            </div>
        </div>
    @endsection
