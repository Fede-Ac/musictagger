@extends("../layouts.app")

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title">Eliminar perfil</h5><!-- TITULO -->
                </div>
                <div class="card-body">
                    <form action="/usuarios/borrar/f/{{ Auth::user()->idUsuario }}" method="POST">
                        @csrf
                        <div class="form-check">
                            <!-- CHECK -->
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">Esta seguro que desea borrar su
                                perfil?</label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Darme de baja</button>
                        <a href="{{ url('/home') }}"> <button type="button" class="btn btn-danger">Cancelar</button> </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
