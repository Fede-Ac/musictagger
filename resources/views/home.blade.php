@extends('layouts.app')

@section('content')

    <div class="justify-content-center">
        <!-- CAROUSEL -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-30 mx-auto" src="{{ asset('images/not-found-image.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-30 mx-auto" src="{{ asset('images/not-found-image.jpg') }}" alt="Second slide">
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
                <table class="table table-dark">
                    <!-- no van las canciones aca, modificar por listas -->
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Link de la letra</th>
                            <th scope="col">link del video</th>
                            <th scope="col">link de Spotify</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($canciones as $cancion)
                            <tr>
                                <td>{{ $cancion->titulo }}</td>
                                <td>{{ $cancion->linkLetra }}</td>
                                <td>{{ $cancion->linkVideo }}</td>
                                <td>{{ $cancion->linkSpotify }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END TABLE -->

        <!-- LISTAS POPULARES -->
        <div class="card text-white bg-dark">
            <div class="card-header">
                Listas de reproducción populares
            </div>
            <div class="card-body">
                <img class="card-img-top" src="" alt="portada">
            </div>
        </div>
        <!-- FIN LISTAS POPULARES -->

        <!-- ETIQUETAS POPULARES -->
        <div class="card text-white bg-dark">
            <div class="card-header">
                Etiquetas populares
            </div>

            <div class="card-body">
                <p>
                    <a class="btn btn-link" data-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        $etiqueta->descripcion
                    </a>
                </p>
                <div class="collapse text-dark" id="collapseExample">
                    <div class="card card-body">
                        EXPLICACION DE LA ETIQUETA
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN ETIQUETAS POPULARES -->

        <!-- CANCIONES ALEATORIAS -->
        <div class="card text-white bg-dark">
            <div class="card-header">
                Canciones aleatorias
            </div>

            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Link de la letra</th>
                            <th scope="col">link del video</th>
                            <th scope="col">link de Spotify</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($canciones as $cancion)
                            <tr>
                                <td><button type="link" class="btn btn-link" data-toggle="modal"
                                        data-target="#exampleModalCenter">{{ $cancion->titulo }}</button>
                                    <!-- Modal -->
                                    <div class="modal fade text-dark" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Mas información de {{ $cancion->titulo }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                   datos de la canción
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"data-dismiss="modal">Cerrar</button>                                               
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fin Modal -->
                                </td>
                                <td>{{ $cancion->linkLetra }}</td>
                                <td>{{ $cancion->linkVideo }}</td>
                                <td>{{ $cancion->linkSpotify }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- FIN CANCIONES ALEATORIAS -->
    </div>
@endsection
