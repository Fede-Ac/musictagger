@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card ">

                <!-- INFORMACIÓN BÁSICA -->
                <img src="{{ asset('images/not-found-image.jpg') }}" alt="Carátula" class="img-thumbnail ml"
                    style="width: 300px;">
                <ul class="list-group list-group-flush mr">
                <li class="list-group-item">Título {{collect([$colCancion])->get('#items.array')}}</li>
                    <li class="list-group-item">Artista</li>
                    <li class="list-group-item">Etiqueta</li>
                    <li class="list-group-item">Año</li>
                    <li class="list-group-item">Calificación</li>
                </ul>
                <!-- FIN INFORMACIÓN BÁSICA -->

                <!-- INFORMACIÓN ADICIONAL -->
                <p>
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">
                        Ver mas datos
                    </button>
                </p>
                <div class="collapse show" id="collapseExample">
                    <ul class="list-group list-group-flush mr">
                        <li class="list-group-item">dato 1</li>
                        <li class="list-group-item">dato 2</li>
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
    @endsection
