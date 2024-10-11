<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Respuesta</title>
</head>
<body>
    <h1>Crear Nueva Respuesta</h1>

    <!-- Mostrar mensajes de éxito -->
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <!-- Formulario para crear una respuesta -->
    <form action="{{ route('respuestas.store') }}" method="POST">
        @csrf
        <label for="texto">Texto:</label>
        <input type="text" name="texto" id="texto" required>
        <br><br>

        <label for="es_correcta">Es correcta:</label>
        <input type="checkbox" name="es_correcta" id="es_correcta">
        <br><br>

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
