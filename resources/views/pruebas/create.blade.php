<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Prueba</title>
</head>
<body>
    <h1>Crear Nueva Prueba</h1>

    <!-- Mostrar mensajes de éxito -->
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <!-- Formulario para crear una prueba con 3 preguntas y sus respectivas respuestas -->
    <form action="{{ route('pruebas.store') }}" method="POST">
        @csrf

        <!-- Título de la prueba -->
        <label for="titulo">Título de la Prueba:</label>
        <input type="text" name="titulo" id="titulo" required>
        <br><br>

        <!-- Preguntas y Respuestas -->
        @for ($i = 0; $i < 3; $i++)
            <h2>Pregunta {{ $i + 1 }}</h2>
            <label for="preguntas[{{ $i }}][texto_pregunta]">Texto de la Pregunta:</label>
            <input type="text" name="preguntas[{{ $i }}][texto_pregunta]" required>
            <br><br>

            <!-- Respuestas -->
            @for ($j = 0; $j < 4; $j++)
                <h3>Respuesta {{ $j + 1 }}</h3>
                <label for="preguntas[{{ $i }}][respuestas][{{ $j }}][texto]">Texto:</label>
                <input type="text" name="preguntas[{{ $i }}][respuestas][{{ $j }}][texto]" required>
                <br><br>

                <label for="preguntas[{{ $i }}][respuestas][{{ $j }}][es_correcta]">Es correcta:</label>
                <input type="checkbox" name="preguntas[{{ $i }}][respuestas][{{ $j }}][es_correcta]">
                <br><br>
            @endfor
        @endfor

        <!-- Botón de guardar -->
        <button type="submit">Guardar Prueba</button>
    </form>

    <!-- Mostrar errores de validación -->
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
