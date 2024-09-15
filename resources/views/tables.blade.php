<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Editor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .admin-bar {
            background-color: #004d99; /* Azul oscuro */
            color: white;
            padding: 15px;
            border-bottom: 2px solid #003366; /* Azul más oscuro */
        }

        .admin-bar input[type="text"] {
            border: none;
            border-radius: 5px;
            padding: 8px;
        }

        .admin-bar button {
            margin-left: 10px;
        }

        .sidebar {
            background-color: #ffffff;
            padding: 15px;
            border-right: 1px solid #ddd;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h5 {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: #333;
        }

        .sidebar .slide-item {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 5px;
            background-color: #e6f7ff; /* Azul muy claro */
            cursor: pointer;
            color: #333;
            transition: background-color 0.3s;
        }

        .sidebar .slide-item.active {
            background-color: #004d99; /* Azul oscuro */
            color: white;
        }

        .content {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            margin: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex-grow: 1;
        }

        .answer-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f9f9f9; /* Gris claro */
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }

        .answer-box.active {
            color: white;
        }

        .answer-box[data-color="red"].active {
            background-color: #ff4d4d; /* Rojo claro */
        }

        .answer-box[data-color="blue"].active {
            background-color: #004d99; /* Azul oscuro */
        }

        .answer-box[data-color="yellow"].active {
            background-color: #ffec80; /* Amarillo suave */
        }

        .answer-box[data-color="green"].active {
            background-color: #66cc66; /* Verde claro */
        }

        .answer-box .checkbox {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            background-color: transparent;
        }

        .slide-item {
            cursor: pointer;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 5px;
            background-color: #ffffff;
            border-radius: 5px;
        }

        .slide-item.active {
            background-color: #004d99; /* Azul oscuro */
            color: white;
        }

        .right-sidebar {
            background-color: #ffffff;
            padding: 15px;
            border-left: 1px solid #ddd;
            height: 100vh;
            width: 200px;
            overflow-y: auto;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .right-sidebar h5 {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: #333;
        }

        .right-sidebar .form-select,
        .right-sidebar .btn {
            margin-bottom: 10px;
        }

        .right-sidebar .btn-danger {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Formulario que envuelve todo el contenido -->
    <form id="quiz-form" method="POST" action="{{ route('save.quiz') }}" enctype="multipart/form-data">
        @csrf

        <!-- Admin Bar -->
        <div class="admin-bar d-flex justify-content-between align-items-center">
            <input type="text" name="title" class="form-control" placeholder="Ingrese el Título de Su prueba"
                style="max-width: 300px;">
            <div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar
                </button>
                <button type="button" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> Eliminar
                </button>
            </div>
        </div>

        <div class="d-flex">
            <!-- Sidebar Izquierda -->
            <div class="sidebar p-3">
                <h5>Preguntas</h5>
                <ul class="list-unstyled" id="slides-list">
                    <!-- Diapositiva predeterminada -->
                    <li class="slide-item active" data-slide="1">Pregunta 1 (Por defecto)</li>
                </ul>
                <button type="button" class="btn btn-primary w-100" id="add-slide">Añadir Página</button>
            </div>

            <!-- Content Central -->
            <div class="content flex-grow-1" id="content-area">
                <!-- Contenido dinámico de las diapositivas -->
                <div id="slide-content-1" class="slide-content">
                    <div class="mb-3">
                        <input type="text" name="slides[1][question]" class="form-control question-input"
                            placeholder="Ingresa Aquí tu Pregunta">
                    </div>
                    <div class="mb-3 text-center">
                        <!-- Campo de carga de imagen -->
                        <label for="slides_1_image" class="btn btn-light border">Cargar Imagen</label>
                        <input type="file" name="slides[1][image]" id="slides_1_image" class="d-none">
                    </div>
                    <div class="answers">
                        <!-- Respuesta 1 -->
                        <div class="answer-box" data-color="red">
                            <input type="checkbox" name="slides[1][correct_answers][]" value="0" class="checkbox">
                            <input type="text" name="slides[1][answers][]" class="form-control answer-input"
                                placeholder="Primera respuesta" style="border: none; background: transparent;">
                        </div>
                        <!-- Respuesta 2 -->
                        <div class="answer-box" data-color="blue">
                            <input type="checkbox" name="slides[1][correct_answers][]" value="1" class="checkbox">
                            <input type="text" name="slides[1][answers][]" class="form-control answer-input"
                                placeholder="Segunda respuesta" style="border: none; background: transparent;">
                        </div>
                        <!-- Respuesta 3 -->
                        <div class="answer-box" data-color="yellow">
                            <input type="checkbox" name="slides[1][correct_answers][]" value="2" class="checkbox">
                            <input type="text" name="slides[1][answers][]" class="form-control answer-input"
                                placeholder="Tercera respuesta" style="border: none; background: transparent;">
                        </div>
                        <!-- Respuesta 4 -->
                        <div class="answer-box" data-color="green">
                            <input type="checkbox" name="slides[1][correct_answers][]" value="3" class="checkbox">
                            <input type="text" name="slides[1][answers][]" class="form-control answer-input"
                                placeholder="Cuarta respuesta" style="border: none; background: transparent;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Derecha -->
            <div class="right-sidebar p-3">
                <h5>Opciones</h5>
                <div class="mb-3">
                    <label for="question_type" class="form-label">Tipo de Pregunta</label>
                    <select id="question_type" class="form-select">
                        <option value="multiple-choice">Opción múltiple</option>
                        <option value="true-false">Verdadero o Falso</option>
                        <option value="short-answer">Respuesta Corta</option>
                    </select>
                </div>
                <button type="button" class="btn btn-danger w-100" id="remove-slide">Eliminar Página</button>
            </div>
        </div>
    </form>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let slideCounter = 1;

            function addSlide() {
                slideCounter++;
                const newSlide = `
                <li class="slide-item" data-slide="${slideCounter}">Pregunta ${slideCounter}</li>
                `;
                document.getElementById('slides-list').insertAdjacentHTML('beforeend', newSlide);

                const newContent = `
                <div id="slide-content-${slideCounter}" class="slide-content">
                    <div class="mb-3">
                        <input type="text" name="slides[${slideCounter}][question]" class="form-control question-input"
                            placeholder="Ingresa Aquí tu Pregunta">
                    </div>
                    <div class="mb-3 text-center">
                        <!-- Campo de carga de imagen -->
                        <label for="slides_${slideCounter}_image" class="btn btn-light border">Cargar Imagen</label>
                        <input type="file" name="slides[${slideCounter}][image]" id="slides_${slideCounter}_image" class="d-none">
                    </div>
                    <div class="answers">
                        <!-- Respuesta 1 -->
                        <div class="answer-box" data-color="red">
                            <input type="checkbox" name="slides[${slideCounter}][correct_answers][]" value="0" class="checkbox">
                            <input type="text" name="slides[${slideCounter}][answers][]" class="form-control answer-input"
                                placeholder="Primera respuesta" style="border: none; background: transparent;">
                        </div>
                        <!-- Respuesta 2 -->
                        <div class="answer-box" data-color="blue">
                            <input type="checkbox" name="slides[${slideCounter}][correct_answers][]" value="1" class="checkbox">
                            <input type="text" name="slides[${slideCounter}][answers][]" class="form-control answer-input"
                                placeholder="Segunda respuesta" style="border: none; background: transparent;">
                        </div>
                        <!-- Respuesta 3 -->
                        <div class="answer-box" data-color="yellow">
                            <input type="checkbox" name="slides[${slideCounter}][correct_answers][]" value="2" class="checkbox">
                            <input type="text" name="slides[${slideCounter}][answers][]" class="form-control answer-input"
                                placeholder="Tercera respuesta" style="border: none; background: transparent;">
                        </div>
                        <!-- Respuesta 4 -->
                        <div class="answer-box" data-color="green">
                            <input type="checkbox" name="slides[${slideCounter}][correct_answers][]" value="3" class="checkbox">
                            <input type="text" name="slides[${slideCounter}][answers][]" class="form-control answer-input"
                                placeholder="Cuarta respuesta" style="border: none; background: transparent;">
                        </div>
                    </div>
                </div>
                `;
                document.getElementById('content-area').insertAdjacentHTML('beforeend', newContent);
            }

            function handleSlideClick(event) {
                if (!event.target.classList.contains('slide-item')) return;

                const slideNumber = event.target.getAttribute('data-slide');
                document.querySelectorAll('.slide-item').forEach(item => item.classList.remove('active'));
                event.target.classList.add('active');

                document.querySelectorAll('.slide-content').forEach(content => content.style.display = 'none');
                document.getElementById(`slide-content-${slideNumber}`).style.display = 'block';
            }

            function removeSlide() {
                const activeSlide = document.querySelector('.slide-item.active');
                if (!activeSlide) return;

                const slideNumber = activeSlide.getAttribute('data-slide');
                document.getElementById(`slide-content-${slideNumber}`).remove();
                activeSlide.remove();

                // Reset to the first slide if the active one was removed
                if (document.querySelectorAll('.slide-item').length > 0) {
                    document.querySelector('.slide-item').classList.add('active');
                    document.getElementById('slide-content-1').style.display = 'block';
                }
            }

            document.getElementById('add-slide').addEventListener('click', addSlide);
            document.getElementById('remove-slide').addEventListener('click', removeSlide);
            document.getElementById('slides-list').addEventListener('click', handleSlideClick);
        });
    </script>
</body>

</html>

