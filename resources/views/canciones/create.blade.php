@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <!-- TITULO -->
                    <h5 class="card-title">Añadir una nueva canción</h5>
                </div>
                <div class="card-body">
                    <form action="/usuarios/guardar/f" method="POST">
                        <!--enctype="multipart/form-data"-->
                        @method('PUT')
                        @csrf
                        <!-- AUTOR -->
                        <div class="form-group">
                            <label for="autor">Autor</label>
                            <select type="text" name="IDautor" class="form-control" placeholder="Ingrese el autor">
                                <option value=""> -- Elija un autor -- </option>
                                @foreach ($autores as $autor)
                                    <option value="{{ $autor->IDautor }}">{{ $autor->nombre }}</option>
                                @endforeach
                            </select>
                            <br>

                            <!-- COLLAPSE 
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                Añadir un autor
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <input type="text" name="IDautor" class="form-control"
                                                placeholder="Ingrese un nuevo autor">
                                        </div>
                                    </div>
                                </div>
                            </div>
                             FIN COLLAPSE -->
                             
                            @if ($errors->has('IDautor'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('IDautor') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- TITULO -->
                        <div class="form-group">
                            <label for="titulo">Título de la canción</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Ingrese el título" required>
                            @if ($errors->has('titulo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- LINK LETRA -->
                        <div class="form-group">
                            <label for="linkLetra">Link de la letra</label>
                            <input type="text" name="linkLetra" class="form-control"
                                placeholder="Ingrese el link de la letra">
                            @if ($errors->has('linkLetra'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('linkLetra') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- LINK VIDEO -->
                        <div class="form-group">
                            <label for="linkVideo">Link del video</label>
                            <input type="text" name="linkVideo" class="form-control"
                                placeholder="Ingrese el link del video">
                            @if ($errors->has('linkVideo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('linkVideo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- LINK SPOTITIFY -->
                        <div class="form-group">
                            <label for="linkSpotify">Link del video</label>
                            <input type="text" name="linkSpotify" class="form-control"
                                placeholder="Ingrese el link de Spotify">
                            @if ($errors->has('linkSpotify'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('linkSpotify') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- BOTONES -->
                        <button type="submit" class="btn btn-primary">Añadir canción</button>
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger mt-3" role="alert">
            <p>Se produjo un error al ingresar los datos</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><!-- ./alert -->
    @endif

@endsection
