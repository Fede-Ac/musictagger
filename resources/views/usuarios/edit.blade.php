@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <!-- TITULO -->
                    <h5 class="card-title">Modificar datos de mi perfil</h5>
                </div>
                <div class="card-body">
                    <form action="/usuarios/modificar/f/{{ Auth::user()->idUsuario }}" method="POST"> <!--enctype="multipart/form-data"-->
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <!-- EMAIL -->
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" maxlength="100"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                                aria-describedby="emailHelp" placeholder="Ingrese correo electrónico"
                                value="{{ Auth::user()->email }}" disabled>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <!-- NOMBRE -->
                            <label for="nombre">Nombre</label>
                            <input type="text" name="name" maxlength="30" class="form-control" id="nombre"
                                value="{{ Auth::user()->nombre }}" placeholder="Ingrese su nombre" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <!-- FECHA DE NACIMIENTO -->
                            <label class="date" for="exampleCheck1">Fecha de nacimiento</label>
                            <input type="date" name="fechaNac"
                                class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" id="date"
                                value="{{ Auth::user()->fechaNac }}" required>
                            @if ($errors->has('date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <!-- CONTRASEÑA -->
                            <label for="password">Nueva contraseña</label>
                            <input type="password" name="password" maxlength="100"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password"
                                placeholder="Ingrese su contraseña">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- BOTONES -->
                        <button type="submit" class="btn btn-primary">Actualizar perfil</button>
                        <a href="{{ url('/home') }}"> <button type="button" class="btn btn-danger">Cancelar</button> </a>
                    </form>
                </div>
            </div>
            <br>           
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
