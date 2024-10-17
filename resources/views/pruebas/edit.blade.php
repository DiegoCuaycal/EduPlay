<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Prueba</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 p-4 shadow bg-white rounded">
        <h2 class="text-center mb-4">Editar Prueba: {{ $prueba->titulo }}</h2>

        <form action="{{ route('pruebas.update', $prueba->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Título de la Prueba</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $prueba->titulo }}" required>
            </div>

            <div id="preguntas">
                @foreach ($prueba->preguntas as $index => $pregunta)
                    <div class="form-group border p-3 mb-4 rounded">
                        <h4 class="text-primary">Pregunta {{ $index + 1 }}</h4>
                        <input type="text" class="form-control mb-3" name="preguntas[{{ $pregunta->id }}]" value="{{ $pregunta->texto }}" required>

                        <label>Respuestas</label>
                        <div class="form-group">
                            @foreach ($pregunta->respuestas as $respuesta)
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="respuestas[{{ $respuesta->id }}]" value="{{ $respuesta->texto }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="correctas[{{ $pregunta->id }}][]" value="{{ $respuesta->id }}" {{ $respuesta->es_correcta ? 'checked' : '' }}> Correcta
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>

