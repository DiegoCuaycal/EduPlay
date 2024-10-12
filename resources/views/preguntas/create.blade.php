
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pregunta</title>
</head>
<body>
    <h1>Crear Nueva Pregunta con Respuestas</h1>

    <!-- Mostrar mensajes de éxito -->
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <!-- Formulario para crear una pregunta con 4 respuestas -->
    <form action="{{ route('preguntas.store') }}" method="POST">
        @csrf
        <label for="texto_pregunta">Texto de la Pregunta:</label>
        <input type="text" name="texto_pregunta" id="texto_pregunta" required>
        <br><br>

        <!-- Respuestas -->
        @for ($i = 0; $i < 4; $i++)
            <h3>Respuesta {{ $i + 1 }}</h3>
            <label for="respuestas[{{ $i }}][texto]">Texto:</label>
            <input type="text" name="respuestas[{{ $i }}][texto]" required>
            <br><br>

            <label for="respuestas[{{ $i }}][es_correcta]">Es correcta:</label>
            <input type="checkbox" name="respuestas[{{ $i }}][es_correcta]">
            <br><br>
        @endfor

        <button type="submit">Guardar</button>
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
