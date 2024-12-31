<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Prueba</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 p-4 shadow bg-white rounded">
        <h2 class="text-center mb-4 text-primary"><i class="bi bi-pencil-square"></i> Editar Prueba: {{ $prueba->titulo }}</h2>

        <form action="{{ route('pruebas.update', $prueba->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Título de la Prueba -->
            <div class="form-group">
                <label for="titulo"><i class="bi bi-book"></i> Título de la Prueba</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $prueba->titulo }}" required>
            </div>

            <!-- Preguntas -->
            <div id="preguntas">
                @foreach ($prueba->preguntas as $index => $pregunta)
                    <div class="form-group border p-3 mb-4 rounded">
                        <h4 class="text-primary"><i class="bi bi-question-circle"></i> Pregunta {{ $index + 1 }}</h4>
                        <input type="text" class="form-control mb-3" name="preguntas[{{ $pregunta->id }}]" value="{{ $pregunta->texto }}" required>

                        <label><i class="bi bi-list"></i> Respuestas</label>
                        <div class="form-group">
                            @foreach ($pregunta->respuestas as $respuesta)
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="respuestas[{{ $respuesta->id }}]" value="{{ $respuesta->texto }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="correctas[{{ $pregunta->id }}][]" value="{{ $respuesta->id }}" {{ $respuesta->es_correcta ? 'checked' : '' }}> 
                                            <i class="bi bi-check-circle-fill text-success ms-2"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar Cambios</button>
                <a href="{{ route('pruebas.cuadros') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>


