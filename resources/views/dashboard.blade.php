@extends('layouts.user_type.auth')

@section('content')
<div class="container">

    
    <!-- Sección de Carrusel de Gamificación -->
    <!-- Sección de Saludo Personalizado -->
    <div class="mt-4 mb-4 p-3 bg-light text-center rounded shadow-sm">
        <h3 class="mb-2" style="color: #343a40;">Bienvenido, {{ auth()->user()->name }}</h3>
        <p class="text-muted">Prepárate para evaluar y potenciar el aprendizaje de tus estudiantes.</p>

        <!-- Botón Crear Nueva Prueba -->
        <div class="text-center mb-4">
            <a href="{{ route('tables') }}" class="btn btn-primary" style="font-size: 1.2rem; padding: 10px 20px;">
                <i class="bi bi-plus-circle"></i> Crear Nueva Prueba
            </a>
        </div>
    </div>

    <div class="text-center mt-4">
        <h1 style="color: #4A90E2; font-weight: bold;">
            <i class="fas fa-gamepad"></i> Transforma el Aprendizaje con Gamificación
        </h1>
        <p class="text-muted"> Crea experiencias interactivas que inspiran y educan. </p>
    </div>

    <hr style="border: 1px solid #ddd; margin: 20px 0;">

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <!-- Contenido del Carrusel -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active position-relative">
                <img src="assets/img/carrucelAdmin/InsipiraNew.avif" class="d-block w-100"
                    alt="Inspira a tus estudiantes">
                <div class="overlay"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);">
                </div>
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center"
                    style="top: 50%; transform: translateY(-50%); text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">
                    <h1 style="font-size: 2.5rem; font-weight: bold; color: #fff;">¡Inspira a tus estudiantes!</h1>
                    <p style="font-size: 1.5rem; color: #f8f9fa;">“Un profesor motiva, inspira y transforma el
                        aprendizaje.”</p>
                    <p style="font-size: 1.2rem; color: #f1f1f1;"><strong>Tip:</strong> Diseña actividades interactivas
                        para fomentar la participación activa.</p>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item position-relative">
                <img src="assets/img/carrucelAdmin/ConstruyeFuturo.jpg" class="d-block w-100" alt="Construye el futuro">
                <div class="overlay"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);">
                </div>
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center"
                    style="top: 50%; transform: translateY(-50%); text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">
                    <h1 style="font-size: 2.5rem; font-weight: bold; color: #fff;">¡Construye el futuro!</h1>
                    <p style="font-size: 1.5rem; color: #f8f9fa;">“La educación es el arma más poderosa que puedes usar
                        para cambiar el mundo.”</p>
                    <p style="font-size: 1.2rem; color: #f1f1f1;"><strong>Tip:</strong> Motiva a tus estudiantes
                        estableciendo metas claras y alcanzables.</p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item position-relative">
                <img src="assets/img/carrucelAdmin/Celebra.jpg" class="d-block w-100" alt="Celebra cada logro">
                <div class="overlay"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);">
                </div>
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center"
                    style="top: 50%; transform: translateY(-50%); text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">
                    <h1 style="font-size: 2.5rem; font-weight: bold; color: #fff;">¡Celebra cada logro!</h1>
                    <p style="font-size: 1.5rem; color: #f8f9fa;">“El aprendizaje no es un destino, es un viaje. Celebra
                        los avances de tus estudiantes.”</p>
                    <p style="font-size: 1.2rem; color: #f1f1f1;"><strong>Desafío:</strong> Crea una actividad nueva
                        cada semana para mantener a tus estudiantes motivados.</p>
                </div>
            </div>
        </div>

        <!-- Controles de navegación -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <hr style="border: 1px solid #ddd; margin: 20px 0;">

    <!-- Sección de Pruebas -->
    <div class="text-center mb-4">
        <h2 style="color: #4A90E2; font-weight: bold;">Resumen de Actividades</h2>
        <p class="text-muted">Explora las pruebas creadas y realizadas por ti.</p>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Sección de Pruebas Creadas -->
    <div style="background-color: #e8f4fc; border-radius: 10px; padding: 20px; margin-bottom: 30px;">
        <h2 class="mb-4">
            <i class="bi bi-trophy-fill" style="color: #4A90E2; margin-right: 10px;"></i>
            Pruebas Creadas
        </h2>

        <div class="scroll-container position-relative">
            <button class="scroll-btn left-btn">&#10094;</button>
            <div class="scrollable-content">
                @foreach ($pruebas as $prueba)
                    <div class="card shadow-lg border-0 m-2"
                        style="background-color: #f8f9fa; width: 200px; display: inline-block;">
                        <div class="rectangulo position-relative"
                            style="height: 100px; overflow: hidden; background-color: #e8f4fc;">
                            <img src="{{ $prueba->imagen ? asset('storage/' . $prueba->imagen) : asset('images/default-image.png') }}"
                                alt="{{ $prueba->titulo }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <span class="badge badge-primary mb-2">{{ $prueba->created_at->diffForHumans() }}</span>
                            <h5 class="card-title">{{ $prueba->titulo }}</h5>
                            <p class="card-text">Descripción de la prueba</p>
                            <a href="{{ route('pruebas.show', $prueba->id) }}" class="btn btn-primary">Ver Prueba</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="scroll-btn right-btn">&#10095;</button>
        </div>
    </div>

    <!-- Sección de Pruebas Realizadas -->
    <div style="background-color: #f4fcef; border-radius: 10px; padding: 20px;">
        <h2 class="mb-4">
            <i class="bi bi-check-circle-fill" style="color: #28a745; font-size: 1.5rem; margin-right: 10px;"></i>
            Pruebas Realizadas
        </h2>

        <div class="scroll-container position-relative">
            <button class="scroll-btn left-btn">&#10094;</button>
            <div class="scrollable-content">
                @foreach ($pruebasRealizadas as $pruebaRealizada)
                    <div class="card shadow-lg border-0 m-2"
                        style="background-color: #f8f9fa; width: 200px; display: inline-block;">
                        <div class="card-body">
                            <span class="badge badge-primary mb-2">
                                {{ $pruebaRealizada->created_at->diffForHumans() }}
                            </span>
                            <h5 class="card-title">{{ $pruebaRealizada->prueba->titulo }}</h5>
                            <p class="card-text">Último Puntaje: {{ $pruebaRealizada->puntaje }}</p>
                            <a href="{{ route('pruebas.realizadas.show', $pruebaRealizada->prueba->id) }}"
                                class="btn btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="scroll-btn right-btn">&#10095;</button>
        </div>
    </div>

    <!-- CSS -->
    <style>
        .scroll-container {
            overflow: hidden;
            white-space: nowrap;
            position: relative;
        }

        .scrollable-content {
            display: inline-block;
            overflow-x: scroll;
            scroll-behavior: smooth;
            width: calc(100% - 40px);
            /* Ajusta según el tamaño de las flechas */
            scrollbar-width: none;
            /* Oculta la barra en Firefox */
            -ms-overflow-style: none;
            /* Oculta la barra en IE y Edge */
        }

        .scrollable-content::-webkit-scrollbar {
            display: none;
            /* Oculta la barra en Chrome, Safari y Opera */
        }

        .scroll-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            /* Fondo con transparencia */
            border: none;
            font-size: 2rem;
            color: white;
            /* Color de la flecha */
            cursor: pointer;
            z-index: 10;
            padding: 10px;
            /* Mejora la área clicable */
            border-radius: 50%;
            /* Hacer las flechas redondas */
            display: none;
            /* Oculta las flechas inicialmente */
        }

        .scroll-btn.show {
            display: block;
        }

        .left-btn {
            left: 0;
        }

        .right-btn {
            right: 0;
        }
    </style>
    <!-- JavaScript -->
    <script>
        document.querySelectorAll('.scroll-container').forEach(container => {
            const leftBtn = container.querySelector('.left-btn');
            const rightBtn = container.querySelector('.right-btn');
            const content = container.querySelector('.scrollable-content');
            // Función para verificar la posición y mostrar/ocultar flechas
            function updateButtons() {
                const maxScrollLeft = content.scrollWidth - content.clientWidth;
                if (content.scrollLeft === 0) {
                    leftBtn.classList.remove('show');
                } else {
                    leftBtn.classList.add('show');
                }
                if (content.scrollLeft >= maxScrollLeft) {
                    rightBtn.classList.remove('show');
                } else {
                    rightBtn.classList.add('show');
                }
            }
            // Desplazamiento a la derecha
            rightBtn.addEventListener('click', () => {
                content.scrollBy({ left: 200, behavior: 'smooth' });
            });
            // Desplazamiento a la izquierda
            leftBtn.addEventListener('click', () => {
                content.scrollBy({ left: -200, behavior: 'smooth' });
            });
            // Escuchar el evento de desplazamiento para ocultar/mostrar las flechas
            content.addEventListener('scroll', updateButtons);
            // Inicialización: Verifica las posiciones de las flechas
            updateButtons();
        });
    </script>
    @endsection