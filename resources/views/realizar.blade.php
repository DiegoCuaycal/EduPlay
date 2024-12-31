@extends('layouts.user_type.auth')
@section('content')

<div id="inicio-mensaje" style="display: block;">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Bootstrap JS Bundle (incluye Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <div class="d-flex justify-content-center align-items-center mt-4">
        <h3 class="text-primary fw-bold text-center border-bottom border-primary pb-2 d-inline-flex align-items-center">
            <i class="bi bi-rocket-takeoff-fill me-2 text-danger"></i>
            ¿Listo para empezar?
        </h3>
    </div>

    <div class="text-center mb-4 p-3 border rounded shadow-sm bg-light">
        <h5 class="text-secondary fw-normal">
            <i class="bi bi-pen text-warning"></i> Realiza tu prueba
        </h5>
        <p class="text-muted">Responde cada pregunta con calma y cuidado. ¡Tú puedes lograrlo!</p>
    </div>

    <div class="card mb-3">
        <img src="{{ $prueba->imagen ? asset('storage/' . $prueba->imagen) : asset('images/default-image.png') }}"
            class="card-img-top" alt="Imagen de la prueba">
    </div>
    <div class="d-flex justify-content-center align-items-center mt-4">
        <button id="startButton"
            class="btn btn-primary btn-lg px-5 py-3 shadow rounded-pill fw-bold d-flex align-items-center justify-content-center"
            style="font-size: 1.5rem;" onclick="iniciarPrueba()">
            <span id="buttonText">
                <i class="bi bi-play-circle-fill me-2"></i> Comenzar
            </span>
            <span id="buttonSpinner" class="spinner-border spinner-border-lg text-light ms-2 d-none" role="status"
                aria-hidden="true">
            </span>
        </button>
    </div>
</div>

<div id="contenido-prueba" style="display: none;">
    <div class="container">
        <!-- Título Principal -->
        <div class="text-center mb-4">
            <h2 class="text-primary fw-bold">
                <i class="bi bi-pencil-square me-2"></i> Realizar Prueba: {{ $prueba->titulo }}
            </h2>
        </div>

        <!-- Tiempo Restante -->
        @if($prueba->tiempo_limite)
            <div class="d-flex justify-content-center align-items-center mb-3">
                <div class="bg-light border rounded p-2 shadow-sm text-center w-25">
                    <i class="bi bi-clock-fill text-danger fs-2"></i>
                    <h5 class="text-danger fw-bold mt-2">Tiempo restante:</h5>
                    <p class="fs-4 text-primary mb-0" id="tiempo-restante">{{ $prueba->tiempo_limite }}</p>
                    <span class="text-muted">minutos</span>
                </div>
            </div>
        @endif
        <form id="formulario-prueba" class="container py-4"
            action="{{ route('realizar-prueba.store', $prueba->url_token) }}" method="POST">
            @csrf
            <div id="preguntas-container">
                @foreach ($prueba->preguntas as $index => $pregunta)
                            <div class="pregunta card shadow-sm mb-4" id="pregunta-{{ $index }}"
                                style="display: {{ $index === 0 ? 'block' : 'none' }};">

                                <div class="card-body">
                                    <!-- Cabecera de la pregunta -->
                                    <div class="d-flex align-items-center gap-3 mb-4">
                                        <span
                                            class="bg-primary text-white d-flex align-items-center justify-content-center rounded-circle"
                                            style="width: 40px; height: 40px;">
                                            <i class="bi bi-patch-question-fill"></i>
                                        </span>
                                        <h5 class="card-title mb-0">{{ $pregunta->texto }}</h5>
                                    </div>

                                    {{-- <!-- Imagen de la pregunta -->
                                    @if ($pregunta->imagen)
                                    <div class="mb-4">
                                        <img src="{{ asset('storage/' . $pregunta->imagen) }}" alt="Imagen de la pregunta"
                                            class="img-fluid rounded">
                                    </div>
                                    @endif --}}

                                    <!-- Respuestas -->
                                    <div class="respuestas mb-4">
                                        @foreach ($pregunta->respuestas as $i => $respuesta)
                                                                @php
                                                                    $bgColors = ['bg-danger-subtle', 'bg-primary-subtle', 'bg-success-subtle', 'bg-warning-subtle'];
                                                                    $borderColors = ['border-danger', 'border-primary', 'border-success', 'border-warning'];
                                                                    // Iconos más apropiados para opciones de respuesta
                                                                    $icons = [
                                                                        'bi bi-record-circle', // Círculo simple para opción A
                                                                        'bi bi-check-circle',  // Círculo con check para opción B
                                                                        'bi bi-star',          // Estrella para opción C
                                                                        'bi bi-square'         // Cuadrado para opción D
                                                                    ];
                                                                    $currentBg = $bgColors[$i % 4];
                                                                    $currentBorder = $borderColors[$i % 4];
                                                                    $currentIcon = $icons[$i % 4];
                                                                @endphp

                                                                <div class="respuesta mb-3 p-3 rounded border {{ $currentBg }} {{ $currentBorder }}"
                                                                    onclick="seleccionarRespuesta(this, {{ $pregunta->id }}, {{ $respuesta->id }})">
                                                                    <label class="d-flex align-items-center gap-2 mb-0" style="cursor: pointer;">
                                                                        <i class="{{ $currentIcon }} fs-5"></i>
                                                                        <div class="form-check mb-0">
                                                                            <input type="radio" class="form-check-input"
                                                                                name="respuesta_{{ $pregunta->id }}" value="{{ $respuesta->id }}" required>
                                                                            <span class="ms-2">{{ $respuesta->texto }}</span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                        @endforeach
                                    </div>

                                    <!-- Botones de navegación -->
                                    <div class="d-flex justify-content-end">
                                        @if ($index < count($prueba->preguntas) - 1)
                                            <button type="button"
                                                class="boton-siguiente btn btn-primary d-flex align-items-center gap-2"
                                                onclick="siguientePregunta({{ $index }})">
                                                Continuar
                                                <i class="bi bi-arrow-right"></i>
                                            </button>
                                        @else
                                            <button type="submit"
                                                class="boton-finalizar btn btn-success d-flex align-items-center gap-2"
                                                onclick="finalizarPrueba({{ $index }})">
                                                Finalizar
                                                <i class="bi bi-check2-circle"></i>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                @endforeach
            </div>
        </form>
    </div>
</div>

@endsection

<script>

    function iniciarPrueba() {
        document.getElementById("inicio-mensaje").style.display = "none";
        document.getElementById("contenido-prueba").style.display = "block";

        const tiempoLimite = {{ $prueba->tiempo_limite ?? 'null' }};
        if (tiempoLimite) {
            iniciarTemporizador(tiempoLimite);
        }
    }

    function iniciarTemporizador(minutos) {
        const tiempoRestante = document.getElementById("tiempo-restante");
        let tiempo = minutos * 60;

        const intervalo = setInterval(() => {
            const minutosRestantes = Math.floor(tiempo / 60);
            const segundosRestantes = tiempo % 60;

            tiempoRestante.textContent = `${minutosRestantes}:${segundosRestantes < 10 ? '0' : ''}${segundosRestantes}`;

            if (tiempo <= 0) {
                clearInterval(intervalo);
                alert("Tiempo agotado. La prueba se enviará automáticamente.");
                document.getElementById("formulario-prueba").submit();
            }

            tiempo--;
        }, 1000);
    }

    function seleccionarRespuesta(elemento, preguntaId, respuestaId) {
        // Quitar la clase activa de las otras respuestas
        const respuestas = elemento.parentElement.querySelectorAll('.respuesta');
        respuestas.forEach(respuesta => respuesta.classList.remove('respuesta-seleccionada'));

        // Agregar la clase activa al elemento actual
        elemento.classList.add('respuesta-seleccionada');

        // Marcar el radio button correspondiente
        const radioInput = elemento.querySelector(`input[name="respuesta_${preguntaId}"][value="${respuestaId}"]`);
        if (radioInput) {
            radioInput.checked = true;
        }
    }

    const tiemposPorPregunta = {}; // Objeto para almacenar los tiempos de inicio por pregunta.

    function iniciarPrueba() {
        document.getElementById("inicio-mensaje").style.display = "none";
        document.getElementById("contenido-prueba").style.display = "block";

        const tiempoLimite = {{ $prueba->tiempo_limite ?? 'null' }};
        if (tiempoLimite) {
            iniciarTemporizador(tiempoLimite);
        }

        // Inicializa el tiempo de la primera pregunta
        iniciarTiempoPregunta(0);
    }

    function iniciarTiempoPregunta(indicePregunta) {
        const tiempoActual = Date.now();
        tiemposPorPregunta[indicePregunta] = tiempoActual; // Registra el tiempo de inicio.
    }

    function siguientePregunta(indiceActual) {
        const preguntaActual = document.getElementById(`pregunta-${indiceActual}`);
        const inputs = preguntaActual.querySelectorAll('input[type="radio"]');
        let respuestaSeleccionada = false;

        inputs.forEach(input => {
            if (input.checked) {
                respuestaSeleccionada = true;
            }
        });

        if (!respuestaSeleccionada) {
            alert("Debe seleccionar una respuesta para continuar.");
            return;
        }

        // Registra el tiempo de respuesta de la pregunta actual.
        const tiempoInicio = tiemposPorPregunta[indiceActual];
        const tiempoRespuesta = (Date.now() - tiempoInicio) / 1000; // Tiempo en segundos.

        // Almacena el tiempo de respuesta en un campo oculto.
        const tiempoInput = document.createElement('input');
        tiempoInput.type = 'hidden';
        tiempoInput.name = `tiempo_pregunta_${indiceActual}`;
        tiempoInput.value = tiempoRespuesta;
        preguntaActual.appendChild(tiempoInput);

        // Oculta la pregunta actual y muestra la siguiente.
        preguntaActual.style.display = "none";
        const siguientePregunta = document.getElementById(`pregunta-${indiceActual + 1}`);
        if (siguientePregunta) {
            siguientePregunta.style.display = "block";
            iniciarTiempoPregunta(indiceActual + 1);
        }
    }

    function finalizarPrueba(indiceActual) {
        const preguntaActual = document.getElementById(`pregunta-${indiceActual}`);
        const inputs = preguntaActual.querySelectorAll('input[type="radio"]');
        let respuestaSeleccionada = false;

        inputs.forEach(input => {
            if (input.checked) {
                respuestaSeleccionada = true;
            }
        });

        if (!respuestaSeleccionada) {
            alert("Debe seleccionar una respuesta para finalizar.");
            return;
        }

        // Registra el tiempo de respuesta de la última pregunta.
        const tiempoInicio = tiemposPorPregunta[indiceActual];
        const tiempoRespuesta = (Date.now() - tiempoInicio) / 1000; // Tiempo en segundos.

        // Almacena el tiempo de respuesta en un campo oculto.
        const tiempoInput = document.createElement('input');
        tiempoInput.type = 'hidden';
        tiempoInput.name = `tiempo_pregunta_${indiceActual}`;
        tiempoInput.value = tiempoRespuesta;
        preguntaActual.appendChild(tiempoInput);

        // Mostrar popup de puntos basado en tiempo y respuesta.
        const respuestaCorrecta = inputs.find(input => input.checked && input.dataset.correct === "true");

        if (respuestaCorrecta) {
            mostrarPopup("Correcto! +100", "green");
            if (tiempoRespuesta <= 15) {
                mostrarPopup("Muy veloz! +100", "green");
            } else if (tiempoRespuesta <= 30) {
                mostrarPopup("Veloz! +50", "green");
            }
        } else {
            mostrarPopup("Incorrecto... +0", "red");
        }

        // Enviar el formulario después de un pequeño retraso para mostrar los popups.
        setTimeout(() => {
            document.getElementById("formulario-prueba").submit();
        }, 1000);
    }
</script>

<style>
    .imagen-container img {
        max-width: 100%;
        height: auto;
    }

    .respuestas {
        display: flex;
        justify-content: space-around;
        gap: 10px;
    }

    .respuesta {
        flex: 1;
        text-align: center;
        padding: 20px;
        cursor: pointer;
        color: white;
        font-weight: bold;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .respuesta:hover {
        opacity: 0.9;
    }

    .respuesta-seleccionada {
        filter: brightness(0.8);
    }

    .boton-finalizar {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .boton-finalizar:hover {
        background-color: #45a049;
    }
</style>