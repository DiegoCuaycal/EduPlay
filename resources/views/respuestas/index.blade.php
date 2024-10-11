<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuestas</title>
</head>
<body>
    <h1>Listado de Respuestas</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Texto</th>
                <th>Es Correcta</th>
            </tr>
        </thead>
        <tbody>
            @foreach($respuestas as $respuesta)
                <tr>
                    <td>{{ $respuesta->id }}</td>
                    <td>{{ $respuesta->texto }}</td>
                    <td>{{ $respuesta->es_correcta ? 'Sí' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
