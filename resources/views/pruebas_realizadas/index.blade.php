@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h1>Pruebas Realizadas</h1>
    <div class="row">
        @foreach ($pruebas as $prueba)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $prueba->titulo }}</h5>
                        <p class="card-text">Intentos: {{ $prueba->pruebasRealizadas->count() }}</p>
                        <a href="{{ route('pruebas.realizadas.show', $prueba->id) }}" class="btn btn-primary">Ver intentos</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection