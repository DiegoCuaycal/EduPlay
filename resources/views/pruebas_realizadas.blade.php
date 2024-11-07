{{-- resources/views/pruebas_realizadas.blade.php --}}
@extends('layouts.user_type.auth')
@section('content')
    <h2>Pruebas Realizadas</h2>
    <ul>
        @foreach ($pruebasRealizadas as $pruebaRealizada)
            <li>
                Prueba: {{ $pruebaRealizada->prueba->titulo }} - Puntaje: {{ $pruebaRealizada->puntaje }}
            </li>
        @endforeach
    </ul>
@endsection