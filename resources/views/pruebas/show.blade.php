@extends('layouts.user_type.auth')

@section('content')
<div class="container my-4">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <div class="bg-light p-4 text-center position-relative mb-4"
        style="border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <div class="position-absolute start-0 top-50 translate-middle-y border border-primary"
            style="width: 100px; height: 2px;"></div>
        <div class="position-absolute end-0 top-50 translate-middle-y border border-primary"
            style="width: 100px; height: 2px;"></div>
        <h1 class="text-primary fw-bold">
            <i class="bi bi-clipboard-check"></i> {{ $prueba->titulo }}
        </h1>
        <p class="text-muted mb-0">
            Una herramienta diseñada para que los profesores puedan evaluar y potenciar el aprendizaje de los
            estudiantes.
        </p>
    </div>


    <div class="row">
        <!-- Sidebar con botones de preguntas -->
        <div class="col-md-3">
            <div class="list-group">
                @foreach($prueba->preguntas as $index => $pregunta)
                    <button class="list-group-item list-group-item-action d-flex align-items-center mb-2"
                        onclick="showPregunta({{ $index }})">
                        <i class="bi bi-question-circle-fill text-secondary me-2"></i>
                        Pregunta {{ $index + 1 }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="col-md-9">
            <div class="mb-4">
                <h3 class="text-secondary">URL para realizar esta prueba:</h3>
                <div class="input-group">
                    <input type="text" value="{{ url('realizar-prueba/' . $prueba->url_token) }}" readonly
                        class="form-control" onclick="this.select();">
                    <button class="btn btn-outline-secondary" type="button"
                        onclick="navigator.clipboard.writeText('{{ url('realizar-prueba/' . $prueba->url_token) }}')">
                        <i class="bi bi-clipboard"></i> Copiar
                    </button>
                </div>
            </div>

            <!-- Contenido de preguntas -->
            <div class="contenido-pregunta">
                @foreach($prueba->preguntas as $index => $pregunta)
                    <div class="pregunta-container" id="pregunta-{{ $index }}" style="display: none;">
                        <h3 class="text-dark">{{ $pregunta->texto }}</h3>
                        <ul class="list-group mt-3">
                            @foreach($pregunta->respuestas as $respuesta)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $respuesta->texto }}
                                    @if($respuesta->es_correcta)
                                        <span class="badge bg-success"><i class="bi bi-check-circle-fill"></i> Correcta</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('pruebas.edit', $prueba->id) }}" class="btn btn-warning mt-4">
                <i class="bi bi-pencil-square"></i> Editar prueba
            </a>
        </div>
    </div>
</div>

<script>
    function showPregunta(index) {
        document.querySelectorAll('.pregunta-container').forEach(container => {
            container.style.display = 'none';
        });
        document.getElementById('pregunta-' + index).style.display = 'block';
    }
    showPregunta(0);
</script>
@endsection