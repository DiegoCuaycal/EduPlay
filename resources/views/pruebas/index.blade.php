<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebas</title>
    <script>
        function togglePreguntas(pruebaId) {
            const preguntasDivs = document.querySelectorAll('.preguntas');
            preguntasDivs.forEach(div => div.style.display = 'none');

            const selectedDiv = document.getElementById('preguntas-' + pruebaId);
            if (selectedDiv.style.display === 'none') {
                selectedDiv.style.display = 'block';
            } else {
                selectedDiv.style.display = 'none';
            }
        }

        function toggleRespuestas(preguntaId) {
            const respuestasDivs = document.querySelectorAll('.respuestas');
            respuestasDivs.forEach(div => div.style.display = 'none');

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
    <h1>Listado de Pruebas</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título de la Prueba</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pruebas as $prueba)
                <tr>
                    <td>{{ $prueba->id }}</td>
                    <td>{{ $prueba->titulo }}</td>
                    <td>
                        <button onclick="togglePreguntas({{ $prueba->id }})">Ver Preguntas</button>
                    </td>
                </tr>
                <!-- Contenedor de Preguntas -->
                <tr class="preguntas" id="preguntas-{{ $prueba->id }}" style="display: none;">
                    <td colspan="3">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Texto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prueba->preguntas as $pregunta)
                                    <tr>
                                        <td>{{ $pregunta->id }}</td>
                                        <td>{{ $pregunta->texto }}</td> <!-- Usar 'texto' ya que es el nombre correcto en la migración -->
                                        <td>
                                            <button onclick="toggleRespuestas({{ $pregunta->id }})">Ver Respuestas</button>
                                        </td>
                                    </tr>
                                    <!-- Contenedor de Respuestas -->
                                    <tr class="respuestas" id="respuestas-{{ $pregunta->id }}" style="display: none;">
                                        <td colspan="3">
                                            <table border="1">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Texto</th>
                                                        <th>Es Correcta</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($pregunta->respuestas as $respuesta)
                                                        <tr>
                                                            <td>{{ $respuesta->id }}</td>
                                                            <td>{{ $respuesta->texto }}</td>
                                                            <td>{{ $respuesta->es_correcta ? 'Sí' : 'No' }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
