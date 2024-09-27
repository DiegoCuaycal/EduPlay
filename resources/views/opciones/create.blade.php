<!-- resources/views/opciones/create.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Opción</title>
</head>
<body>
    <h1>Crear Opción</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('opciones.store') }}" method="POST">
        @csrf
        <label for="texto">Texto de la Opción:</label>
        <input type="text" name="texto" id="texto" required>

        <label for="es_correcta">¿Es correcta?</label>
        <input type="checkbox" name="es_correcta" id="es_correcta">

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
