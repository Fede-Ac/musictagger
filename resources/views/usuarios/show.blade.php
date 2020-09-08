@extends("../layouts.app")

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <!-- TITULO -->
                    <h5 class="card-title">Bienvenido a su perfil: {{ Auth::user()->nombre }}</h5>
                </div>

                <div class="card-body">
                    <!-- CUERPO -->
                    <p class="card-text">Nombre: {{ Auth::user()->nombre }}</p>
                    <p class="card-text">Fecha de nacimiento: {{ Auth::user()->fechaNac }}</p>
                    <p class="card-text">Correo electrónico: {{ Auth::user()->email }}</p>
                    <p class="card-text">Usuario registrado el: {{ Auth::user()->created_at }}</p>
                </div>

                <div class="card-footer text-muted">
                    <!-- BOTON EDITAR -->
                    <a href="{{ url('/usuarios/modificar/' . Auth::user()->idUsuario) }}" class="btn btn-primary">Editar Perfil</a>                    
                </div>
            </div>
        </div>
    </div>
@endsection
