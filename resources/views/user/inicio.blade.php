@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-5">
    <h2>Resumen General</h2>
    
    <div class="mb-4">
        <h4>Progreso General</h4>
        <p>Puntaje: 85</p> <!-- Ejemplo de puntaje -->
        <p>Logros: 5</p> <!-- Ejemplo de logros -->
        <p>Porcentaje de Completitud: 75%</p> <!-- Ejemplo de porcentaje -->
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
        </div>
    </div>

    <div class="mb-4">
        <h4>Pruebas Pendientes</h4>
        <ul class="list-group">
            <li class="list-group-item">Matemáticas - 10/11/2024</li>
            <li class="list-group-item">Historia - 12/11/2024</li>
            <li class="list-group-item">Ciencias - 15/11/2024</li>
        </ul>
    </div>

    <div>
        <h4>Pruebas Completadas</h4>
        <ul class="list-group">
            <li class="list-group-item">Geografía - Puntaje: 90</li>
            <li class="list-group-item">Literatura - Puntaje: 80</li>
            <li class="list-group-item">Física - Puntaje: 75</li>
        </ul>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

