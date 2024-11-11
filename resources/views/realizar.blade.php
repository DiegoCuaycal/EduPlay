@extends('layouts.user_type.auth')
@section('content')
<div id="inicio-mensaje" style="display: block;">
    <h3>¿Listo para empezar?</h3>
    <button onclick="iniciarPrueba()">Comenzar</button>
</div>

<div id="contenido-prueba" style="display: none;">
    <div class="container">
        <h2>Realizar Prueba: {{ $prueba->titulo }}</h2>
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
    }

    function finalizarPrueba() {
        document.getElementById("formulario-prueba").submit();
    }
</script>
