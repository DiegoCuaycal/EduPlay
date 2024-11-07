@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h1>Detalles de la Prueba Realizada: {{ $prueba->titulo }}</h1>
    <div class="list-group">
        @foreach($intentos as $intento)
            <div class="list-group-item">
                <h5>Puntaje: {{ $intento->puntaje }}</h5>
                <p>Completado el: {{ $intento->created_at->format('d-m-Y H:i') }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
