<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas</title>
    <script>
        function toggleRespuestas(preguntaId) {
            // Ocultar todas las respuestas primero
            const respuestasDivs = document.querySelectorAll('.respuestas');
            respuestasDivs.forEach(div => div.style.display = 'none');

            // Mostrar las respuestas de la pregunta seleccionada
            const selectedDiv = document.getElementById('respuestas-' + preguntaId);
            if (selectedDiv.style.display === 'none') {
                selectedDiv.style.display = 'block';
            } else {
                selectedDiv.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <h1>Listado de Preguntas</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Texto de la Pregunta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($preguntas as $pregunta)
                <tr>
                    <td>{{ $pregunta->id }}</td>
                    <td>{{ $pregunta->texto }}</td> <!-- Asegúrate de usar 'texto' ya que es el nombre correcto en la migración -->
                    <td><button onclick="toggleRespuestas({{ $pregunta->id }})">Ver Respuestas</button></td>
                </tr>
                <tr id="respuestas-{{ $pregunta->id }}" style="display: none;">
                    <td colspan="3">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Texto</th>
                                <th>Es Correcta</th>
                            </tr>
                            @foreach($pregunta->respuestas as $respuesta)
                                <tr>
                                    <td>{{ $respuesta->id }}</td>
                                    <td>{{ $respuesta->texto }}</td>
                                    <td>{{ $respuesta->es_correcta ? 'Sí' : 'No' }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
