<!-- resources/views/quiz_editor.blade.php -->
<!-- resources/views/quiz_editor.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Editor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .admin-bar {
            background-color: #eaeaea;
            padding: 15px;
        }

        .sidebar {
            background-color: #fafafa;
            padding: 10px;
            border-right: 1px solid #ddd;
        }

        .content {
            padding: 20px;
            background-color: #d5eaff;
            border-radius: 10px;
            margin: 15px;
        }

        .answer-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #e0e0e0;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            color: #333;
        }

        .answer-box.active {
            color: white;
        }

        .answer-box[data-color="red"].active {
            background-color: #ff7f7f;
        }

        .answer-box[data-color="blue"].active {
            background-color: #007bff;
        }

        .answer-box[data-color="yellow"].active {
            background-color: #ffc107;
        }

        .answer-box[data-color="green"].active {
            background-color: #28a745;
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
            background-color: #fff;
        }

        .slide-item.active {
            background-color: #007bff;
            color: white;
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
                <button type="button" class="btn btn-secondary">Salir</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>

        <div class="d-flex">
            <!-- Sidebar -->
            <div class="sidebar p-3">
                <h5>Preguntas</h5>
                <ul class="list-unstyled" id="slides-list">
                    <!-- Diapositiva predeterminada -->
                    <li class="slide-item active" data-slide="1">Pregunta 1 (Por defecto)</li>
                </ul>
                <button type="button" class="btn btn-primary w-100" id="add-slide">Añadir Página</button>
            </div>

            <!-- Content -->
            <div class="content flex-grow-1" id="content-area">
                <!-- Contenido dinámico de las diapositivas -->
                <div id="slide-content-1">
                    <div class="mb-3">
                        <input type="text" name="slides[1][question]" class="form-control question-input"
                            placeholder="Ingresa Aquí tu Pregunta">
                    </div>
                    <div class="mb-3 text-center">
                        <!-- Campo de carga de imagen -->
                        <label for="slides[1][image]" class="btn btn-light border">Cargar Imagen</label>
                        <input type="file" name="slides[1][image]" id="slides[1][image]" style="display: none;">
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
        </div>

        <!-- Campos ocultos para el manejo de slides -->
        <input type="hidden" name="current_slide" id="current-slide" value="1">
        <input type="hidden" name="total_questions" id="total-questions" value="1">
    </form>



    <script>
        let currentSlide = 1; // Mantiene un control de la diapositiva actual
        let slidesData = { 1: getSlideContent(1) }; // Datos temporales de las diapositivas

        // Función para cambiar de diapositiva
        function switchToSlide(slideNumber) {
            // Guardar el contenido actual antes de cambiar
            slidesData[currentSlide] = getSlideContent(currentSlide);

            // Cambiar la diapositiva actual
            currentSlide = slideNumber;

            // Cargar el contenido correspondiente a la diapositiva seleccionada
            loadSlideContent(slideNumber);

            // Marcar la diapositiva seleccionada como activa
            document.querySelectorAll('.slide-item').forEach(item => {
                item.classList.remove('active');
            });
            document.querySelector(`.slide-item[data-slide="${slideNumber}"]`).classList.add('active');
        }

        // Añadir nueva diapositiva
        document.getElementById('add-slide').addEventListener('click', function () {
            const slidesList = document.getElementById('slides-list');
            const newSlideNumber = Object.keys(slidesData).length + 1; // Obtener el número de la nueva diapositiva

            // Crear una nueva diapositiva en la lista
            const newSlide = document.createElement('li');
            newSlide.classList.add('slide-item');
            newSlide.dataset.slide = newSlideNumber;
            newSlide.textContent = `Pregunta ${newSlideNumber}`;
            newSlide.addEventListener('click', function () {
                switchToSlide(newSlideNumber);
            });
            slidesList.appendChild(newSlide);

            // Inicializar contenido para la nueva diapositiva
            slidesData[newSlideNumber] = {
                question: '',
                answers: ['', '', '', ''],
                correct_answers: []
            };

            // Cambiar automáticamente a la nueva diapositiva
            switchToSlide(newSlideNumber);

            // Actualizar el número total de preguntas
            document.getElementById('total-questions').value = newSlideNumber;
        });


        let slideIndex = 1;
        document.getElementById('add-slide').addEventListener('click', function () {
            slideIndex++;
            const slideContent = `
        <div id="slide-content-${slideIndex}">
            <div class="mb-3">
                <input type="text" name="slides[${slideIndex}][question]" class="form-control question-input" placeholder="Ingresa Aquí tu Pregunta">
            </div>
            <div class="mb-3 text-center">
                <label for="slides[${slideIndex}][image]" class="btn btn-light border">Cargar Imagen</label>
                <input type="file" name="slides[${slideIndex}][image]" id="slides[${slideIndex}][image]" style="display: none;">
            </div>
            <div class="answers">
                <div class="answer-box" data-color="red">
                    <input type="checkbox" name="slides[${slideIndex}][correct_answers][]" value="0" class="checkbox">
                    <input type="text" name="slides[${slideIndex}][answers][]" class="form-control answer-input" placeholder="Primera respuesta" style="border: none; background: transparent;">
                </div>
                <!-- Más respuestas aquí... -->
            </div>
        </div>
    `;
            document.getElementById('content-area').insertAdjacentHTML('beforeend', slideContent);
        });


    </script>

</body>

</html>