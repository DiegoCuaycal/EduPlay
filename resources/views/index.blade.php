@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Evaluaciones</h1>
        @if($evaluaciones->isEmpty())
            <p>No hay evaluaciones disponibles.</p>
        @else
            <ul>
                @foreach($evaluaciones as $evaluacion)
                    <li>{{ $evaluacion->title }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
