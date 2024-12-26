@extends('layouts.user_type.auth')

@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Prueba</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
    <style>
        .section-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .question-card {
            background-color: #ffffff;
            border-radius: 10px;
            border: 1px solid #dee2e6;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        .progress-bar {
            background-color: #4A90E2;
        }

        .btn-preview {
            background-color: #ffc107;
            color: #fff;
        }

        .btn-preview:hover {
            background-color: #e0a800;
        }

        .accordion-button:not(.collapsed) {
            background-color: #4A90E2;
            color: #fff;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid py-4">

        <div class="text-center mb-4 p-4 bg-light shadow-sm rounded">
            <!-- Ícono Representativo -->
            <h1 class="display-6 text-primary">
                <i class="bi bi-pencil-square me-2"></i> Crear Prueba
            </h1>

            <!-- Subtítulo Motivacional -->
            <p class="text-muted">
                Organiza y personaliza tus preguntas y respuestas para una experiencia interactiva.
                <strong>¡Haz que tus pruebas sean inolvidables!</strong>
            </p>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>¡Éxito!</strong> {{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Separador Visual -->
            <hr class="my-4" style="border-top: 2px solid #4A90E2; width: 50%; margin: auto;">

            <!-- Botón de Ayuda -->
            <button class="btn btn-link text-primary mt-2" data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Aquí puedes crear una prueba interactiva personalizada">
                <a href="{{ route('ayudaProfesor') }}" class="btn btn-primary"
                    style="font-size: 1.2rem; padding: 10px 20px;">
                    <i class="bi bi-question-circle"></i> ¿Necesitas ayuda?
                </a>
            </button>
        </div>


        <div class="row">
            <!-- Barra lateral con las preguntas -->
            <div class="col-md-3">
                <div class="bg-white rounded shadow-sm p-3"
                    style="position: sticky; top: 20px; max-height: 80vh; overflow-y: auto;">
                    <h4 class="text-primary mb-3 bi bi-list-check">Preguntas</h4>
                    <div id="sidebar-preguntas">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <button class="btn btn-outline-primary flex-grow-1 mr-2 pregunta-tab"
                                data-target="pregunta-1">Pregunta 1</button>
                            <button class="btn btn-outline-danger btn-sm eliminar-pregunta"
                                data-id="pregunta-1">Eliminar</button>
                        </div>
                    </div>
                    <button class="btn btn-success w-100 mt-3" id="añadir-pagina">Añadir Pregunta</button>
                </div>
            </div>


            <!-- Contenido principal -->
            <div class="col-md-9">
                <div class="bg-white rounded shadow-sm p-4">
                    <form action="{{ route('pruebas.store') }}" method="POST" id="form-prueba" enctype="multipart/form-data">
                        @csrf
                    
                        <!-- Título de la Prueba -->
                        <div class="form-group">
                            <label for="titulo" class="h5 text-primary bi bi-pencil-square">Título de la Prueba:</label>
                            <input type="text" class="form-control form-control-lg" id="titulo" name="titulo"
                                   placeholder="Escribe el título de la prueba" value="{{ old('titulo') }}">
                            @error('titulo')
                            <p class="alert alert-danger text-center text-white my-2">{{$message}}</p>
                            @enderror
                        </div>
                    
                        <!-- Tiempo Límite -->
                        <div class="form-group">
                            <label for="tiempo_limite" class="h5 text-primary bi bi-clock">Tiempo Límite (en minutos):</label>
                            <input type="number" class="form-control form-control-lg" id="tiempo_limite"
                                   name="tiempo_limite" placeholder="Ejemplo: 30">
                        </div>
                    
                        <!-- Imagen de la Prueba -->
                        <div class="form-group">
                            <label for="imagen" class="h5 text-primary bi bi-image">Imagen de la Prueba (opcional):</label>
                            <input type="file" class="form-control form-control-lg" id="imagen" name="imagen" accept="image/*">
                            @error('imagen')
                            <p class="alert alert-danger text-center text-white my-2">{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Contenedor de preguntas -->
                        <div id="preguntas-container">
                            <div class="pregunta-container pregunta-activa" id="pregunta-1">
                                <div class="border rounded p-4 mb-4 bg-light">
                                    <h3 class="text-primary mb-4">Pregunta 1</h3>
                                    <div class="form-group">
                                        <label for="pregunta-texto-1">Pregunta:</label>
                                        <input type="text" class="form-control" id="pregunta-texto-1" name="pregunta[]"
                                            placeholder="Escribe la pregunta">
                                        @error('pregunta[]')
                                            <p class="alert alert-danger text-center text-white my-2">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary">Respuestas:</label>
                                        @for ($i = 1; $i <= 4; $i++)
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="respuesta-1[]"
                                                    placeholder="Escribe la respuesta {{ $i }}">
                                                <div class="input-group-append">
                                                    <div class="input-group-text bg-white">
                                                        <input type="checkbox" name="correcta-1[{{ $i }}]" value="1"
                                                            class="mr-2">
                                                        <span>Correcta</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <!-- Botón guardar -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5 bi bi-save-fill" id="guardar-todo">Guardar
                        Todo</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div> <!-- Aquí está el cierre adicional de container-fluid -->


    <script>
        // Mantener el JavaScript existente sin cambios
        let contadorPreguntas = 1;

        function actualizarEventosBotones() {
            document.querySelectorAll('.pregunta-tab').forEach(function (button) {
                button.addEventListener('click', function () {
                    const target = this.getAttribute('data-target');
                    mostrarPregunta(target);
                });
            });
        }

        function mostrarPregunta(targetId) {
            document.querySelectorAll('.pregunta-container').forEach(function (pregunta) {
                pregunta.classList.remove('pregunta-activa');
            });
            document.getElementById(targetId).classList.add('pregunta-activa');
        }

        document.getElementById('añadir-pagina').addEventListener('click', function (e) {
            e.preventDefault();
            contadorPreguntas++;

            const sidebarPreguntas = document.getElementById('sidebar-preguntas');
            const contenedorButton = document.createElement('div');
            contenedorButton.className = 'd-flex justify-content-between align-items-center mb-2';
            contenedorButton.innerHTML = `
                <button class="btn btn-outline-primary flex-grow-1 mr-2 pregunta-tab" data-target="pregunta-${contadorPreguntas}">
                    Pregunta ${contadorPreguntas}
                </button>
                <button class="btn btn-outline-danger btn-sm eliminar-pregunta" data-id="pregunta-${contadorPreguntas}">
                    Eliminar
                </button>
            `;
            sidebarPreguntas.appendChild(contenedorButton);

            const contenedorPreguntas = document.getElementById('preguntas-container');
            const nuevaPregunta = document.createElement('div');
            nuevaPregunta.className = 'pregunta-container';
            nuevaPregunta.id = `pregunta-${contadorPreguntas}`;
            nuevaPregunta.innerHTML = `
                <div class="border rounded p-4 mb-4 bg-light">
                    <h3 class="text-primary mb-4">Pregunta ${contadorPreguntas}</h3>
                    <div class="form-group">
                        <label for="pregunta-texto-${contadorPreguntas}">Pregunta:</label>
                        <input type="text" class="form-control" id="pregunta-texto-${contadorPreguntas}" 
                            name="pregunta[]" placeholder="Escribe la pregunta">
                    </div>
                    <div class="form-group">
                        <label class="text-primary">Respuestas:</label>
                        ${crearRespuestasHTML(contadorPreguntas)}
                    </div>
                </div>
            `;
            contenedorPreguntas.appendChild(nuevaPregunta);

            actualizarEventosBotones();
            actualizarEventosEliminar();
            mostrarPregunta(`pregunta-${contadorPreguntas}`);
        });

        function crearRespuestasHTML(numPregunta) {
            let respuestasHTML = '';
            for (let i = 1; i <= 4; i++) {
                respuestasHTML += `
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="respuesta-${numPregunta}[]" 
                            placeholder="Escribe la respuesta ${i}">
                        <div class="input-group-append">
                            <div class="input-group-text bg-white">
                                <input type="checkbox" name="correcta-${numPregunta}[${i}]" value="1" class="mr-2">
                                <span>Correcta</span>
                            </div>
                        </div>
                    </div>
                `;
            }
            return respuestasHTML;
        }

        function actualizarEventosEliminar() {
            document.querySelectorAll('.eliminar-pregunta').forEach(function (button) {
                button.addEventListener('click', function () {
                    const preguntaId = this.getAttribute('data-id');
                    document.getElementById(preguntaId).remove();
                    this.closest('.d-flex').remove();
                    renumerarPreguntas();
                });
            });
        }

        function renumerarPreguntas() {
            contadorPreguntas = 0;
            document.querySelectorAll('.pregunta-container').forEach(function (pregunta, index) {
                contadorPreguntas++;
                pregunta.id = `pregunta-${contadorPreguntas}`;
                pregunta.querySelector('h3').innerText = `Pregunta ${contadorPreguntas}`;
            });

            document.querySelectorAll('.pregunta-tab').forEach(function (boton, index) {
                boton.setAttribute('data-target', `pregunta-${index + 1}`);
                boton.innerText = `Pregunta ${index + 1}`;
            });

            actualizarEventosBotones();
            actualizarEventosEliminar();
        }

        actualizarEventosBotones();
        actualizarEventosEliminar();
    </script>
</body>

</html>
@endsection