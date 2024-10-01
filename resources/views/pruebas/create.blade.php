@extends('layouts.app')

@section('title', 'Crear Prueba')

@section('content')
    <div class="container mt-5">
        <h1>Crear Prueba</h1>

        <form action="{{ route('pruebas.store') }}" method="POST">
            @csrf

            <!-- Título de la prueba -->
            <div class="form-group mb-3">
                <label for="titulo">Título de la prueba:</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>

            <!-- Preguntas -->
            @for ($i = 0; $i < 3; $i++)
                <div class="card mt-4">
                    <div class="card-body">
                        <h5>Pregunta {{ $i + 1 }}</h5>
                        <div class="form-group mb-3">
                            <label for="preguntas[{{ $i }}][texto_pregunta]">Texto de la pregunta:</label>
                            <input type="text" name="preguntas[{{ $i }}][texto_pregunta]" class="form-control" required>
                        </div>

                        <!-- Respuestas -->
                        @for ($j = 0; $j < 4; $j++)
                            <div class="form-group mb-2">
                                <label for="preguntas[{{ $i }}][respuestas][{{ $j }}][texto]">Texto de la respuesta {{ $j + 1 }}:</label>
                                <input type="text" name="preguntas[{{ $i }}][respuestas][{{ $j }}][texto]" class="form-control" required>
                                <div class="form-check">
                                    <input type="checkbox" name="preguntas[{{ $i }}][respuestas][{{ $j }}][es_correcta]" class="form-check-input">
                                    <label class="form-check-label">Es correcta</label>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endfor

            <!-- Botón de guardar -->
            <button type="submit" class="btn btn-primary mt-4">Guardar Prueba</button>
        </form>
    </div>
@endsection
