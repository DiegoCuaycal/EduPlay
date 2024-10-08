<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Prueba</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Crear Prueba</h1>

        <!-- Formulario para enviar las preguntas y respuestas -->
        <form action="{{ route('pruebas.store') }}" method="POST">
            @csrf

            <!-- Título de la Prueba -->
            <div class="form-group">
                <label for="titulo">Título de la Prueba:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escribe el título de la prueba">
            </div>

            <!-- Contenedor dinámico para preguntas -->
            <div id="preguntas-container">
                <!-- Primera pregunta por defecto -->
                <div class="pagina">
                    <h3>Pregunta 1</h3>
                    <div class="form-group">
                        <label for="pregunta-1">Pregunta:</label>
                        <input type="text" class="form-control" id="pregunta-1" name="pregunta[]" placeholder="Escribe la pregunta">
                    </div>
                    <!-- Respuestas para la pregunta -->
                    <div class="form-group">
                        <label>Respuestas:</label>
                        @for ($i = 1; $i <= 4; $i++)
                        <div class="form-inline mb-2">
                            <input type="text" class="form-control mr-2" name="respuesta-1[]" placeholder="Escribe la respuesta {{ $i }}">
                            <!-- Cambié el nombre del checkbox para que sea único y específico a cada opción -->
                            <input type="checkbox" name="correcta-1[{{ $i }}]" value="1" class="mr-2"> Correcta
                        </div>
                        @endfor
                    </div>
                    <hr>
                </div>
            </div>

            <!-- Botones -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="guardar-todo">Guardar Todo</button>
                <button class="btn btn-success" id="añadir-pagina">Añadir Página</button>
                <button class="btn btn-danger" id="borrar-pagina" disabled>Borrar Página (Próximamente)</button>
            </div>
        </form>
    </div>

    <!-- Script para manejar el contenido dinámico -->
    <script>
        let contadorPreguntas = 1;

        document.getElementById('añadir-pagina').addEventListener('click', function(e) {
            e.preventDefault();
            contadorPreguntas++;

            const contenedorPreguntas = document.getElementById('preguntas-container');
            const nuevaPagina = document.createElement('div');
            nuevaPagina.classList.add('pagina');
            nuevaPagina.innerHTML = `
                <h3>Pregunta ${contadorPreguntas}</h3>
                <div class="form-group">
                    <label for="pregunta-${contadorPreguntas}">Pregunta:</label>
                    <input type="text" class="form-control" id="pregunta-${contadorPreguntas}" name="pregunta[]" placeholder="Escribe la pregunta">
                </div>
                <div class="form-group">
                    <label>Respuestas:</label>
                    ${crearRespuestasHTML(contadorPreguntas)}
                </div>
                <hr>
            `;
            contenedorPreguntas.appendChild(nuevaPagina);
        });

        // Función para generar los inputs de las respuestas
        function crearRespuestasHTML(numPregunta) {
            let respuestasHTML = '';
            for (let i = 1; i <= 4; i++) {
                respuestasHTML += `
                    <div class="form-inline mb-2">
                        <input type="text" class="form-control mr-2" name="respuesta-${numPregunta}[]" placeholder="Escribe la respuesta ${i}">
                        <input type="checkbox" name="correcta-${numPregunta}[${i}]" value="1" class="mr-2"> Correcta
                    </div>
                `;
            }
            return respuestasHTML;
        }
    </script>

</body>
</html>
