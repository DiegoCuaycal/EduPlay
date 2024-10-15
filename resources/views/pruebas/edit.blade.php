<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Prueba</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Prueba: {{ $prueba->titulo }}</h2>

        <form action="{{ route('pruebas.update', $prueba->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Título de la Prueba</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $prueba->titulo }}" required>
            </div>

            <div id="preguntas">
                @foreach ($prueba->preguntas as $index => $pregunta)
                    <div class="form-group">
                        <h4>Pregunta {{ $index + 1 }}</h4>
                        <input type="text" class="form-control" name="preguntas[{{ $pregunta->id }}]" value="{{ $pregunta->texto }}" required>

                        <label>Respuestas</label>
                        <div class="form-group">
                            @foreach ($pregunta->respuestas as $respuesta)
                                <input type="text" class="form-control" name="respuestas[{{ $respuesta->id }}]" value="{{ $respuesta->texto }}" required>
                                <input type="checkbox" name="correctas[{{ $pregunta->id }}][]" value="{{ $respuesta->id }}" {{ $respuesta->es_correcta ? 'checked' : '' }}> Correcta
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
