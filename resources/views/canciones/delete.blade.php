@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <!-- TITULO -->
                    <h5 class="card-title">Eliminar la canción: </h5>
                </div>
                <div class="card-body">
                    <form action="/canciones/eliminar/f/" method="POST">
                        <!--enctype="multipart/form-data"-->
                        @method('PUT')
                        @csrf
                        <!-- BOTONES -->
                        <button type="submit" class="btn btn-primary">Eliminar canción</button>
                        <a href="{{ url('/home') }}"> <button type="button" class="btn btn-danger">Cancelar</button> </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
