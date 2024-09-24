@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Evaluaciones</h1>
        
        <!-- Mostrar mensaje de éxito si existe -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($evaluaciones->isEmpty())
            <p>No hay evaluaciones disponibles.</p>
        @else
            <ul class="list-group">
                @foreach($evaluaciones as $evaluacion)
                    <li class="list-group-item">{{ $evaluacion->title }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

@endsection
