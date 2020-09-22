@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <!-- TITULO -->
                    <h5 class="card-title">Modicicar la canción: {{ $cancion->titulo }}</h5>
                </div>
                <div class="card-body">
                    <form action="/usuarios/guardar" method="PUT">
                        @method('PUT')
                        @csrf
                        <!-- BOTONES -->
                        <button type="submit" class="btn btn-primary">Modificar la canción</button>
                        <a href="{{ url('/home') }}"> <button type="button" class="btn btn-danger">Cancelar</button> </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
