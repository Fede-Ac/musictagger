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
                    <form action="/usuarios/guardar" method="POST">
                        <!--enctype="multipart/form-data"-->
                        @method('PUT')
                        @csrf
                        <!-- TITULO -->
                        <div class="form-group">
                            <label for="titulo">Título de la canción</label>
                            <input type="text" name="titulo" maxlength="60" class="form-control"
                                placeholder="Ingrese el título" required>
                            @if ($errors->has('titulo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- GENERO -->
                        <div class="form-group">
                            <label for="titulo">Género de la canción</label>
                            <select type="text" name="genero" class="form-control" placeholder="Ingrese el genero">
                                <option value=""> -- Elija un género -- </option>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->IDgenero }}">{{ $genero->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
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

                            <!-- COLLAPSE -->
                            <div id="accordionOne">
                                <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Añadir un autor
                                </button>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionOne">
                                    <input type="text" name="autor" maxlength="30" class="form-control"
                                        placeholder="Ingrese un nuevo autor">
                                </div>
                            </div>
                            <!-- FIN COLLAPSE -->

                            @if ($errors->has('IDautor'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('IDautor') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- ALBUM -->
                        <div class="form-group">
                            <label for="album">Álbum</label>
                            <select type="text" name="IDalbum" class="form-control" placeholder="Ingrese el álbum">
                                <option value=""> -- Elija un álbum -- </option>
                                @foreach ($albumes as $album)
                                    <option value="{{ $album->IDalbum }}">{{ $album->nombre }}</option>
                                @endforeach
                            </select>
                            <br>
                            <!-- COLLAPSE -->
                            <div id="accordionTree">
                                <button type="button" class="btn btn-link" data-toggle="collapse"
                                    data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree">
                                    Añadir un Álbum
                                </button>

                                <div id="collapseTree" class="collapse" aria-labelledby="headingTree"
                                    data-parent="#accordionTree">
                                    <label>Nombre</label>
                                    <input type="text" name="albumNom" maxlength="30" class="form-control"
                                        placeholder="Nombre del álbum">
                                        <label>Año del álbum</label>
                                    <input type="number" name="anio" maxlength="4" class="form-control"
                                        placeholder="Año de salida del álbum">
                                        <label>Discrofráfica</label>
                                    <input type="text" name="discografica" maxlength="30" class="form-control"
                                        placeholder="Discrofráfica">
                                </div>
                            </div>
                            <!-- FIN COLLAPSE -->
                        </div>
                        <!-- LINK LETRA -->
                        <div class="form-group">
                            <label for="linkLetra">Link de la letra</label>
                            <input type="text" name="linkLetra" maxlength="150" class="form-control"
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
                            <input type="text" name="linkVideo" maxlength="150" class="form-control"
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
                            <input type="text" name="linkSpotify" maxlength="150" class="form-control"
                                placeholder="Ingrese el link de Spotify">
                            @if ($errors->has('linkSpotify'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('linkSpotify') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- BOTONES -->
                        <button type="submit" class="btn btn-primary">Añadir canción</button>
                        <a href="{{ url('/home') }}"> <button type="button" class="btn btn-danger">Cancelar</button> </a>
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
