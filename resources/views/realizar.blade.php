@extends('layouts.user_type.auth')
@section('content')

<div id="inicio-mensaje" style="display: block;">
    <h3>¿Listo para empezar?</h3>
    <button onclick="iniciarPrueba()">Comenzar</button>
</div>

<div id="contenido-prueba" style="display: none;">
    <div class="container">
        <h2>Realizar Prueba: {{ $prueba->titulo }}</h2>
        @if($prueba->tiempo_limite)
            <p><strong>Tiempo restante:</strong> <span id="tiempo-restante">{{ $prueba->tiempo_limite }}</span> minutos</p>
        @endif
        <form id="formulario-prueba" action="{{ route('realizar-prueba.store', $prueba->url_token) }}" method="POST">
            @csrf
            <div id="preguntas-container">
                @foreach ($prueba->preguntas as $index => $pregunta)
                    <div class="pregunta" id="pregunta-{{ $index }}" style="display: {{ $index === 0 ? 'block' : 'none' }};">
                        <h5>{{ $pregunta->texto }}</h5>
                        
                        <!-- Imagen de la pregunta -->
                        @if ($pregunta->imagen)
                            <div class="imagen-container">
                                <img src="{{ asset('storage/' . $pregunta->imagen) }}" alt="Imagen de la pregunta">
                            </div>
                        @endif

                        <div class="respuestas">
                            @foreach ($pregunta->respuestas as $i => $respuesta)
                                <div class="respuesta" 
                                    style="background-color: {{ ['#ff4d4d', '#4d79ff', '#4dff4d', '#ffc34d'][$i % 4] }};"
                                    onclick="seleccionarRespuesta(this, {{ $pregunta->id }}, {{ $respuesta->id }})">
                                    <label>
                                        <input type="radio" name="respuesta_{{ $pregunta->id }}" value="{{ $respuesta->id }}" required>
                                        {{ $respuesta->texto }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <br>
                        @if ($index < count($prueba->preguntas) - 1)
                            <button type="button" class="boton-siguiente" onclick="siguientePregunta({{ $index }})">Continuar</button>
                        @else
                            <button type="submit" class="boton-finalizar">Finalizar</button>
                        @endif
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

        preguntaActual.style.display = "none";

        const siguientePregunta = document.getElementById(`pregunta-${indiceActual + 1}`);
        if (siguientePregunta) {
            siguientePregunta.style.display = "block";
        }
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
