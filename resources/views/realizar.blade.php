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
            @foreach ($prueba->preguntas as $pregunta)
                <h5>{{ $pregunta->texto }}</h5>
                @foreach ($pregunta->respuestas as $respuesta)
                    <label>
                        <input type="radio" name="respuesta_{{ $pregunta->id }}" value="{{ $respuesta->id }}">
                        {{ $respuesta->texto }}
                    </label>
                @endforeach
            @endforeach
            <button type="button" onclick="finalizarPrueba()">Guardar y Terminar</button>
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

    function finalizarPrueba() {
        document.getElementById("formulario-prueba").submit();
    }
</script>
