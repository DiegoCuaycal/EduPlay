@extends('layouts.user_type.auth')


@section('content')
<div class="container">
    <h1>{{ $prueba->titulo }}</h1>

    <div class="sidebar">
        @foreach($prueba->preguntas as $index => $pregunta)
            <button class="btn btn-secondary mb-2" onclick="showPregunta({{ $index }})">
                Pregunta {{ $index + 1 }}
            </button>
        @endforeach
    </div>

    <h3>URL para realizar esta prueba:</h3>
    <input type="text" value="{{ route('realizar.prueba', $prueba->id) }}" readonly onclick="this.select();" class="form-control">


    <div class="contenido-pregunta">
        @foreach($prueba->preguntas as $index => $pregunta)
            <div class="pregunta-container" id="pregunta-{{ $index }}" style="display: none;">
                <h3>{{ $pregunta->texto }}</h3>
                <ul>
                    @foreach($pregunta->respuestas as $respuesta)
                        <li>
                            {{ $respuesta->texto }}
                            @if($respuesta->es_correcta)
                                <strong>(Correcta)</strong>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
    <a href="{{ route('pruebas.edit', $prueba->id) }}" class="btn btn-warning">Editar prueba</a>
</div>

<script>
function showPregunta(index) {
    // Ocultar todas las preguntas
    document.querySelectorAll('.pregunta-container').forEach(container => {
        container.style.display = 'none';
    });

    // Mostrar la pregunta seleccionada
    document.getElementById('pregunta-' + index).style.display = 'block';
}

// Mostrar la primera pregunta por defecto
showPregunta(0);
</script>
@endsection
