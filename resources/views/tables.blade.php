@extends('layouts.user_type.auth')

@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Prueba</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos para la barra lateral de preguntas */
        .sidebar {
            width: 200px;
            float: left;
            margin-right: 20px;
        }

        .sidebar button {
            width: 100%;
            margin-bottom: 10px;
            text-align: left;
        }

        /* Ocultar preguntas por defecto */
        .pregunta-container {
            display: none;
        }

        /* Mostrar la pregunta activa */
        .pregunta-activa {
            display: block;
        }

        .row {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="text-center">
            <h1>Crear Prueba</h1>
            <!-- Aquí puedes añadir más contenido, como el formulario -->
        </div>

        <div class="row">
            <!-- Barra lateral con las preguntas -->
            <div class="sidebar">
                <h4>Preguntas</h4>
                <div id="sidebar-preguntas">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <button class="btn btn-secondary pregunta-tab" data-target="pregunta-1">Pregunta 1</button>
                        <button class="btn btn-danger btn-sm eliminar-pregunta" data-id="pregunta-1">Eliminar</button>
                    </div>
                </div>
                <button class="btn btn-success mt-3" id="añadir-pagina">Añadir Pregunta</button>
            </div>

            <!-- Formulario para enviar las preguntas y respuestas -->
            <div class="col">
                <form action="{{ route('pruebas.store') }}" method="POST" id="form-prueba">
                    @csrf

                    <!-- Título de la Prueba -->
                    <div class="form-group">
                        <label for="titulo">Título de la Prueba:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo"
                            placeholder="Escribe el título de la prueba">
                    </div>

                    <!-- Contenedor dinámico para preguntas -->
                    <div id="preguntas-container">
                        <!-- Primera pregunta por defecto -->
                        <div class="pregunta-container pregunta-activa" id="pregunta-1">
                            <h3>Pregunta 1</h3>
                            <div class="form-group">
                                <label for="pregunta-texto-1">Pregunta:</label>
                                <input type="text" class="form-control" id="pregunta-texto-1" name="pregunta[]"
                                    placeholder="Escribe la pregunta">
                            </div>
                            <div class="form-group">
                                <label>Respuestas:</label>
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="form-inline mb-2">
                                        <input type="text" class="form-control mr-2" name="respuesta-1[]"
                                            placeholder="Escribe la respuesta {{ $i }}">
                                        <input type="checkbox" name="correcta-1[{{ $i }}]" value="1" class="mr-2"> Correcta
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="guardar-todo">Guardar Todo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script para manejar el contenido dinámico -->
    <script>
        let contadorPreguntas = 1;

        // Función para manejar el cambio de preguntas al hacer clic en los botones de la barra lateral
        function actualizarEventosBotones() {
            document.querySelectorAll('.pregunta-tab').forEach(function (button) {
                button.addEventListener('click', function () {
                    const target = this.getAttribute('data-target');
                    mostrarPregunta(target);
                });
            });
        }

        // Mostrar la pregunta correspondiente y ocultar las demás
        function mostrarPregunta(targetId) {
            document.querySelectorAll('.pregunta-container').forEach(function (pregunta) {
                pregunta.classList.remove('pregunta-activa');
            });
            document.getElementById(targetId).classList.add('pregunta-activa');
        }

        // Añadir una nueva pregunta
        document.getElementById('añadir-pagina').addEventListener('click', function (e) {
            e.preventDefault();
            contadorPreguntas++;

            // Crear un nuevo botón en la barra lateral
            const sidebarPreguntas = document.getElementById('sidebar-preguntas');
            const nuevoBoton = document.createElement('button');
            nuevoBoton.classList.add('btn', 'btn-secondary', 'pregunta-tab');
            nuevoBoton.setAttribute('data-target', `pregunta-${contadorPreguntas}`);
            nuevoBoton.innerText = `Pregunta ${contadorPreguntas}`;
            sidebarPreguntas.appendChild(nuevoBoton);

            // Crear una nueva pregunta en el contenedor principal
            const contenedorPreguntas = document.getElementById('preguntas-container');
            const nuevaPregunta = document.createElement('div');
            nuevaPregunta.classList.add('pregunta-container');
            nuevaPregunta.setAttribute('id', `pregunta-${contadorPreguntas}`);
            nuevaPregunta.innerHTML = `
        <h3>Pregunta ${contadorPreguntas}</h3>
        <div class="form-group">
            <label for="pregunta-texto-${contadorPreguntas}">Pregunta:</label>
            <input type="text" class="form-control" id="pregunta-texto-${contadorPreguntas}" name="pregunta[]" placeholder="Escribe la pregunta">
        </div>
        <div class="form-group">
            <label>Respuestas:</label>
            ${crearRespuestasHTML(contadorPreguntas)}
        </div>
        <button class="btn btn-danger eliminar-pregunta" data-id="pregunta-${contadorPreguntas}">Eliminar Pregunta</button>
    `;
            contenedorPreguntas.appendChild(nuevaPregunta);

            // Actualizar los eventos de clic para todos los botones
            actualizarEventosBotones();
            actualizarEventosEliminar();

            // Mostrar la nueva pregunta recién añadida
            mostrarPregunta(`pregunta-${contadorPreguntas}`);
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

        // Función para eliminar una pregunta
        function actualizarEventosEliminar() {
            document.querySelectorAll('.eliminar-pregunta').forEach(function (button) {
                button.addEventListener('click', function () {
                    const preguntaId = this.getAttribute('data-id');
                    document.getElementById(preguntaId).remove();
                    document.querySelector(`button[data-target='${preguntaId}']`).remove();

                    // Actualizar los números de las preguntas después de eliminar una
                    renumerarPreguntas();
                });
            });
        }

        // Renumerar las preguntas y sus botones después de eliminar una
        function renumerarPreguntas() {
            contadorPreguntas = 0; // Reiniciar el contador para empezar desde 1
            document.querySelectorAll('.pregunta-container').forEach(function (pregunta, index) {
                contadorPreguntas++;
                pregunta.setAttribute('id', `pregunta-${contadorPreguntas}`);
                pregunta.querySelector('h3').innerText = `Pregunta ${contadorPreguntas}`;
                pregunta.querySelectorAll('input[type="text"]').forEach(function (input, idx) {
                    const respuestaName = `respuesta-${contadorPreguntas}[]`;
                    input.setAttribute('name', respuestaName);
                });
                pregunta.querySelector('.eliminar-pregunta').setAttribute('data-id', `pregunta-${contadorPreguntas}`);
            });

            document.querySelectorAll('.pregunta-tab').forEach(function (boton, index) {
                boton.setAttribute('data-target', `pregunta-${index + 1}`);
                boton.innerText = `Pregunta ${index + 1}`;
            });

            // Actualizar eventos de los botones y eliminar
            actualizarEventosBotones();
            actualizarEventosEliminar();
        }

        // Iniciar eventos para los botones existentes al cargar la página
        actualizarEventosBotones();
        actualizarEventosEliminar();

    </script>
</body>

</html>
@endsection