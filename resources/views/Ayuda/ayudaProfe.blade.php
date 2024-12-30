@extends('layouts.user_type.auth')

@section('content')

<div class="container my-5">
    <!-- Encabezado -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <style>
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover .card-title {
            color: #007bff;
        }

        .card:hover .card-footer a {
            background-color: #6f42c1;
            border-color: #6f42c1;
        }

        .progress-wrapper {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            width: 90%;
            max-width: 600px;
        }

        .position-fixed-feedback {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
    </style>

    <!-- Encabezado -->
    <div class="text-center mb-5">
        <h1 class="display-5 text-primary">
            <i class="bi bi-lightbulb-fill"></i> Consejos para Crear Pruebas Interactivas
        </h1>
        <p class="text-muted">Utiliza estas recomendaciones para diseñar pruebas dinámicas y efectivas.</p>
    </div>

    <div class="text-center mb-4">
        <a href="{{ route('tables') }}" class="btn btn-primary" style="font-size: 1.2rem; padding: 10px 20px;">
            <i class="bi bi-plus-circle"></i> Crear Nueva Prueba
        </a>
    </div>

    <!-- Tarjetas de Consejos -->
    <div class="row g-4">
        <!-- Tarjeta 1 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-chat-dots-fill text-primary" style="font-size: 2.5rem;"></i>
                    <h5 class="card-title mt-3">Usa un Lenguaje Claro</h5>
                    <p class="card-text text-muted">Asegúrate de que las preguntas y respuestas sean fáciles de entender
                        para tus estudiantes.</p>
                </div>
            </div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-clipboard-check text-success" style="font-size: 2.5rem;"></i>
                    <h5 class="card-title mt-3">Limita las Preguntas</h5>
                    <p class="card-text text-muted">Evita que las pruebas sean demasiado largas. Recomendamos un máximo
                        de 10 preguntas por prueba.</p>
                </div>
            </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-check-circle-fill text-warning" style="font-size: 2.5rem;"></i>
                    <h5 class="card-title mt-3">Marca una Respuesta Correcta</h5>
                    <p class="card-text text-muted">Asegúrate de que al menos una respuesta esté marcada como correcta
                        para cada pregunta.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Separador -->
    <div class="my-5 text-center">
        <hr class="w-50 mx-auto">
        <span class="text-muted">Explora más consejos para mejorar tus pruebas</span>
        <hr class="w-50 mx-auto">
    </div>

</div>

@endsection