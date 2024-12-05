@extends('layouts.user_type.auth')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Prueba</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container-fluid py-4">
        <div class="text-center mb-4">
            <h1 class="display-6 text-primary">Crear Prueba</h1>
        </div>
    
        <div class="row">
            <!-- Barra lateral con las preguntas -->
            <div class="col-md-3">
                <div class="bg-white rounded shadow-sm p-3" 
                    style="position: sticky; top: 20px; max-height: 80vh; overflow-y: auto;">
                    <h4 class="text-primary mb-3">Preguntas</h4>
                    <div id="sidebar-preguntas">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <button class="btn btn-outline-primary flex-grow-1 mr-2 pregunta-tab" data-target="pregunta-1">Pregunta 1</button>
                            <button class="btn btn-outline-danger btn-sm eliminar-pregunta" data-id="pregunta-1">Eliminar</button>
                        </div>
                    </div>
                    <button class="btn btn-success w-100 mt-3" id="añadir-pagina">Añadir Pregunta</button>
                </div>
            </div>

    
            <!-- Contenido principal -->
            <div class="col-md-9">
                <div class="bg-white rounded shadow-sm p-4">
                    <form action="{{ route('pruebas.store') }}" method="POST" id="form-prueba">
                        @csrf
    
                        <!-- Título de la Prueba -->
                        <div class="form-group">
                            <label for="titulo" class="h5 text-primary">Título de la Prueba:</label>
                            <input type="text" class="form-control form-control-lg" id="titulo" name="titulo" 
                                placeholder="Escribe el título de la prueba" 
                                @error('titulo') 
                                    is-invalid
                                @enderror"
                                  value="{{ old('titulo') }}"
                                >
                            @error('titulo')
                                <p class="alert alert-danger text-center text-white my-2">{{$message}}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="tiempo_limite" class="h5 text-primary">Tiempo Límite (en minutos):</label>
                            <input type="number" class="form-control form-control-lg" id="tiempo_limite" name="tiempo_limite" 
                                   placeholder="Ejemplo: 30">
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
                                                            <input type="checkbox" name="correcta-1[{{ $i }}]" value="1" class="mr-2">
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
                            <button type="submit" class="btn btn-primary btn-lg px-5" id="guardar-todo">Guardar Todo</button>
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
            document.querySelectorAll('.pregunta-tab').forEach(function(button) {
                button.addEventListener('click', function() {
                    const target = this.getAttribute('data-target');
                    mostrarPregunta(target);
                });
            });
        }

        function mostrarPregunta(targetId) {
            document.querySelectorAll('.pregunta-container').forEach(function(pregunta) {
                pregunta.classList.remove('pregunta-activa');
            });
            document.getElementById(targetId).classList.add('pregunta-activa');
        }

        document.getElementById('añadir-pagina').addEventListener('click', function(e) {
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
            document.querySelectorAll('.eliminar-pregunta').forEach(function(button) {
                button.addEventListener('click', function() {
                    const preguntaId = this.getAttribute('data-id');
                    document.getElementById(preguntaId).remove();
                    this.closest('.d-flex').remove();
                    renumerarPreguntas();
                });
            });
        }

        function renumerarPreguntas() {
            contadorPreguntas = 0;
            document.querySelectorAll('.pregunta-container').forEach(function(pregunta, index) {
                contadorPreguntas++;
                pregunta.id = `pregunta-${contadorPreguntas}`;
                pregunta.querySelector('h3').innerText = `Pregunta ${contadorPreguntas}`;
            });

            document.querySelectorAll('.pregunta-tab').forEach(function(boton, index) {
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