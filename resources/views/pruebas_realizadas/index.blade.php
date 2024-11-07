@extends('layouts.user_type.auth')
@section('content')
<div class="container">
    <h1>Pruebas Realizadas</h1>
    <div class="row">
        @foreach($pruebasRealizadas as $pruebaRealizada)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pruebaRealizada->prueba->titulo }}</h5>
                        <p>{{ $pruebaRealizada->prueba->descripcion }}</p>
                        <a href="{{ route('pruebas.realizadas.show', $pruebaRealizada->prueba->id) }}" class="btn btn-primary">Ver intentos</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection