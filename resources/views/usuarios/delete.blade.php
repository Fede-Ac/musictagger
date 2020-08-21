@extends("../layouts.app")

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title">Eliminar perfil</h5><!-- TITULO -->
                </div>
                <div class="card-body">
                    <form action="/usuarios/borrar/f/{{ Auth::user()->idUsuario }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <!-- CONTRASEÑA -->
                            <label for="exampleInputPassword1">Ingrese la contraseña para confirmar identidad</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-check">
                            <!-- CHECK -->
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Esta seguro que desea borrar su
                                perfil?</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Borrar perfil</button>
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
