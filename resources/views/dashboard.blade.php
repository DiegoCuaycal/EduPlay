@extends('layouts.user_type.auth')
@section('content')
<div class="container">
    <!-- Sección de Carrusel de Gamificación -->
        <!-- Sección de Saludo Personalizado -->
        <div class="mt-4 mb-4 p-3 bg-light text-center rounded shadow-sm">
            <h3 class="mb-2" style="color: #343a40;">Bienvenido, {{ auth()->user()->name }}</h3>
            <p class="text-muted">Prepárate para evaluar y potenciar el aprendizaje de tus estudiantes.</p>
        </div>
        <!-- Importa Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <div class="container mt-5">
            <div class="row g-4">
                <!-- Tarjeta 1: Pruebas Creadas -->
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 rounded">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">Pruebas Creadas</h6>
                                <h4 class="fw-bold mb-0">12</h4>
                            </div>
                            <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 50px; height: 50px;">
                                <i class="fas fa-file-alt"></i>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <small class="text-success fw-bold">+10% Desde ayer</small>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 2: Pruebas Pendientes -->
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 rounded">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">Pruebas Pendientes</h6>
                                <h4 class="fw-bold mb-0">3</h4>
                            </div>
                            <div class="bg-warning text-white rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 50px; height: 50px;">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <small class="text-danger fw-bold">-5% Esta semana</small>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 3: Estudiantes Evaluados -->
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 rounded">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">Estudiantes Evaluados</h6>
                                <h4 class="fw-bold mb-0">65</h4>
                            </div>
                            <div class="bg-success text-white rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 50px; height: 50px;">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <small class="text-success fw-bold">+8% Esta semana</small>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 4: Evaluaciones Totales -->
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 rounded">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">Evaluaciones Totales</h6>
                                <h4 class="fw-bold mb-0">80</h4>
                            </div>
                            <div class="bg-danger text-white rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 50px; height: 50px;">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <small class="text-success fw-bold">+15% Último mes</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap Script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



        <div class="container text-center">
            <h2 class="mb-4 display-4 text-primary">Gamificación</h2>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1537511446984-935f663eb1f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>¡Estudia y gana!</h5>
                        <p>“La práctica hace al maestro. ¡Aprovecha cada oportunidad!”</p>
                        <p><strong>Desafío:</strong> Completa la prueba en menos de 10 minutos y obtén un badge
                            especial.
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Prepárate para el éxito</h5>
                        <p>“Cada error es una oportunidad para aprender. ¡No te rindas!”</p>
                        <p><strong>Tip:</strong> Revisa tus notas antes de comenzar la prueba.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1552793494-111afe03d0ca?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>¡Hazlo por ti!</h5>
                        <p>“El éxito es la suma de pequeños esfuerzos repetidos día tras día.”</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Sección de Pruebas Creadas -->
        <h2 class="mb-4">Pruebas Creadas</h2>
        <div class="scroll-container position-relative">
            <button class="scroll-btn left-btn">&#10094;</button>
            <div class="scrollable-content">
                @foreach ($pruebas as $prueba)
                    <div class="card shadow-lg border-0 m-2"
                        style="background-color: #f8f9fa; width: 200px; display: inline-block;">
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
        <!-- Sección de Pruebas Realizadas -->
        <h2 class="mb-4">Pruebas Realizadas</h2>
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