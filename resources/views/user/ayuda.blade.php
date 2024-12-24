@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-5">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <!-- Título principal -->
    <div class="text-center mb-4">
        <h2 class="text-primary fw-bold" style="font-size: 2.5rem;">
            <i class="bi bi-controller text-info"></i> ¿Cómo jugar?
        </h2>
        <p class="text-muted" style="font-size: 1.2rem;">
            Aprende a jugar y acumular puntos contestando rápido y correctamente.
        </p>
    </div>

    <!-- Consejos en tarjetas -->
    <div class="row justify-content-center">
        <!-- Tarjeta Paso 1 -->
        <div class="col-md-4">
            <div class="card text-center shadow-lg border-0 mb-4">
                <div class="card-body">
                    <i class="bi bi-key text-primary mb-3" style="font-size: 3rem;"></i>
                    <h5 class="card-title fw-bold text-primary">Paso 1</h5>
                    <p class="card-text text-muted">Ingresa al juego utilizando el código proporcionado.</p>
                </div>
            </div>
        </div>

        <!-- Tarjeta Paso 2 -->
        <div class="col-md-4">
            <div class="card text-center shadow-lg border-0 mb-4">
                <div class="card-body">
                    <i class="bi bi-question-circle text-success mb-3" style="font-size: 3rem;"></i>
                    <h5 class="card-title fw-bold text-success">Paso 2</h5>
                    <p class="card-text text-muted">Lee la pregunta y selecciona tu respuesta lo más rápido posible.</p>
                </div>
            </div>
        </div>

        <!-- Tarjeta Paso 3 -->
        <div class="col-md-4">
            <div class="card text-center shadow-lg border-0 mb-4">
                <div class="card-body">
                    <i class="bi bi-check-circle text-warning mb-3" style="font-size: 3rem;"></i>
                    <h5 class="card-title fw-bold text-warning">Paso 3</h5>
                    <p class="card-text text-muted">Responde correctamente para acumular más puntos.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Consejos adicionales -->
    <div class="row justify-content-center">
        <!-- Tarjeta Paso 4 -->
        <div class="col-md-4">
            <div class="card text-center shadow-lg border-0 mb-4">
                <div class="card-body">
                    <i class="bi bi-stars text-danger mb-3" style="font-size: 3rem;"></i>
                    <h5 class="card-title fw-bold text-danger">Paso 4</h5>
                    <p class="card-text text-muted">Obtén puntos extra si tienes una racha de respuestas correctas.</p>
                </div>
            </div>
        </div>

        <!-- Tarjeta Paso 5 -->
        <div class="col-md-4">
            <div class="card text-center shadow-lg border-0 mb-4">
                <div class="card-body">
                    <i class="bi bi-trophy text-info mb-3" style="font-size: 3rem;"></i>
                    <h5 class="card-title fw-bold text-info">Paso 5</h5>
                    <p class="card-text text-muted">¡El jugador con más puntos al final gana!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection