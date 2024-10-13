
@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">Cómo jugar</h2>
    <p class="text-center text-muted">Aquí te explicamos cómo se juega y ganas puntos al contestar rápido y correctamente.</p>
    
    <div class="card mt-3 shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-white text-center">
            <h5 class="text-white">Instrucciones</h5> <!-- El texto del encabezado está en blanco -->
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Paso 1:</strong> Ingresa al juego con el código proporcionado.</li>
                <li class="list-group-item"><strong>Paso 2:</strong> Lee la pregunta y selecciona la respuesta lo más rápido posible.</li>
                <li class="list-group-item"><strong>Paso 3:</strong> Responde correctamente para ganar más puntos.</li>
                <li class="list-group-item"><strong>Paso 4:</strong> Gana puntos extra si tienes una racha de respuestas correctas.</li>
                <li class="list-group-item"><strong>Paso 5:</strong> ¡El jugador con más puntos al final gana!</li>
            </ul>
        </div>
    </div>
</div>
@endsection



