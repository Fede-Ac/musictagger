@extends('layouts.app')

@section('content')

    <div class="justify-content-center">
        <!-- CAROUSEL -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- END CAROUSEL -->

        <!-- TABLE -->
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Link letra</th>
                    <th scope="col">link video</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($canciones as $cancion)
                    <tr>
                        <td>{{ $canciones->titulo }}</td>
                        <td>{{ $canciones->linkLetra }}</td>
                        <td>{{ $canciones->linkVideo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- END TABLE -->

        <!-- LISTAS POPULARES -->
        <div class="card text-white bg-dark">
            <div class="card-header">
                Listas de reproducción populares
            </div>
            <div class="card-BODY">
                <img class="card-img-top" src="" alt="Card image cap">
            </div>
            <!-- FIN LISTAS POPULARES -->

            <!-- ETIQUETAS POPULARES -->
            <div class="card text-white bg-dark">
                <div class="card-header">
                    Etiquetas populares
                </div>
                <p>
                <div class="card-body">
                    <a class="btn btn-link" data-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        ETIQUETA 1
                    </a>
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">
                        ETIQUETA 2
                    </button>
                    </p>
                    <div class="collapse" id="collapseExample">
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
                                <th scope="col">Link letra</th>
                                <th scope="col">link video</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($canciones as $cancion)
                                <tr>
                                    <td>{{ $canciones->titulo }}</td>
                                    <td>{{ $canciones->linkLetra }}</td>
                                    <td>{{ $canciones->linkVideo }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- FIN CANCIONES ALEATORIAS -->


        </div>

    @endsection
