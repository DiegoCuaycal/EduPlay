@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-4">

    <head>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    </head>

    <!-- Título principal centrado -->
    <div class="text-center mb-4">
        <h1 class="text-primary fw-bold">
            <i class="bi bi-list-check me-2"></i> Pruebas Realizadas
        </h1>
    </div>

    <!-- Grid de Pruebas -->
    <div class="row g-4">
        @foreach($pruebasRealizadas as $pruebaRealizada)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <!-- Encabezado con azul medio oscuro -->
                    <div class="card-header bg-primary text-white d-flex align-items-center justify-content-center">
                        <i class="bi bi-clipboard2-fill me-2"></i>
                        <span class="fw-bold">{{ $pruebaRealizada->prueba->titulo }}</span>
                    </div>
                    <!-- Cuerpo -->
                    <div class="card-body d-flex flex-column">
                        <p class="text-muted mb-4">{{ $pruebaRealizada->prueba->descripcion }}</p>

                        <a href="{{ route('pruebas.realizadas.show', $pruebaRealizada->prueba->id) }}"
                            class="btn btn-success w-100 mt-auto">
                            <i class="bi bi-eye-fill me-1"></i> Ver Intentos
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection