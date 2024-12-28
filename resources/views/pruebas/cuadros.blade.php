@extends('layouts.user_type.auth')

@section('content')
<div class="container py-4">
    <!-- Título del apartado -->
    <div class="text-center mb-4">
        <h1 style="color: #4A90E2; font-weight: bold;">
            <i class="bi bi-controller"></i> Actividades Realizadas
        </h1>
        <!-- Link de iconos de Bootstrap -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
        <p class="text-muted">Revisa tus logros y el progreso alcanzado con tus estudiantes.</p>
    </div>

    <!-- Filtros -->
    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-outline-secondary me-2">Completadas</button>
        <button class="btn btn-outline-secondary me-2">En Progreso</button>
        <button class="btn btn-outline-secondary">Todas</button>
    </div>

    <!-- Tarjetas de actividades realizadas -->
    <div class="row">
        @foreach($pruebas as $prueba)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded">
                    <!-- Imagen de fondo (placeholder) -->
                    <div class="rectangulo position-relative" style="height: 150px; background-color: #f8f9fa; overflow: hidden;">
                        <img src="{{ $prueba->imagen ? asset('storage/' . $prueba->imagen) : asset('images/default-image.png') }}" 
                         alt="{{ $prueba->titulo }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 p-2 bg-primary text-white rounded-end">
                            <i class="bi bi-calendar-event"></i> {{ $prueba->created_at->format('d M, Y') }}
                        </div>
                    </div>                    
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $prueba->titulo }}</h5>
                        <p class="card-text mb-2">
                            <i class="bi bi-question-circle"></i> Preguntas: {{ $prueba->preguntas->count() }}
                        </p>
                        <p class="card-text">
                            <i class="bi bi-clock"></i> Tiempo estimado: {{ $prueba->tiempo_limite ?? 'N/A' }} minutos
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('pruebas.show', $prueba->id) }}" class="btn btn-primary">
                            <i class="bi bi-eye"></i> Ver Prueba
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pie de página informativo -->
    <div class="text-center mt-5">
        <p class="text-muted">¿Necesitas ayuda? Visita la sección de <a href="#">soporte</a> o <a href="#">estadísticas
                generales</a>.</p>
    </div>
</div>
@endsection