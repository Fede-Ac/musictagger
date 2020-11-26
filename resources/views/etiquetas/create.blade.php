@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <!-- acá va el contenido -->
                    <div class="card-header">
                        <!-- TITULO -->
                        <h5 class="card-title">Añadir una nueva etiqueta</h5>
                    </div>
                    <div class="card-body">
                        <form action="/etiqueta/store" method="POST">
                            <!--enctype="multipart/form-data"-->
                            @method('PUT')
                            @csrf

                        <!-- DESCRIPCION -->
                        <div class="form-group">
                            <label for="titulo">Nombre de la etiqueta</label>
                            <input type="text" name="descripcion" maxlength="30" class="form-control"
                                placeholder="Ingrese el nombre de la etiqueta" required autofocus>
                            @if ($errors->has('descripcion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- TIPO -->
                        <div class="form-group">
                            <label for="titulo">Tipo de etiqueta</label>
                            <select type="text" name="tipo" class="form-control" placeholder="Ingrese el tipo de etiqueta">
                                <option value=""> -- Elija un tipo -- </option>
                                
                                    <option value="Publico">Público</option>
                                    <option value="Lugar">Lugar</option>
                                    <option value="Otro">Otro</option>
                                
                            </select>
                        </div>
                        <!-- BOTONES -->
                        <button type="submit" class="btn btn-primary">Añadir canción</button>
                        <a href="{{ url('/home') }}"> <button type="button" class="btn btn-danger">Cancelar</button> </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
