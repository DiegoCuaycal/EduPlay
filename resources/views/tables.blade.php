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
            height: 100vh;
            overflow-y: auto;
        }

        .content {
            padding: 20px;
            background-color: #d5eaff;
            border-radius: 10px;
            margin: 15px;
            width: 100%;
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

        .right-sidebar {
            background-color: #fafafa;
            padding: 10px;
            border-left: 1px solid #ddd;
            height: 100vh;
            width: 200px;
            overflow-y: auto;
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
                    <label for="points">Puntos</label>
                    <select id="points" class="form-select">
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                        <option value="400">400</option>
                        <option value="500">500</option>
                        <option value="600">600</option>
                        <option value="700">700</option>
                        <option value="800">800</option>
                        <option value="900">900</option>
                        <option value="1000">1000</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="time">Tiempo (segundos)</label>
                    <select id="time" class="form-select">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="60">60</option>
                        <option value="70">70</option>
                        <option value="80">80</option>
                        <option value="90">90</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <button type="button" class="btn btn-danger w-100" id="delete-slide">Eliminar Diapositiva</button>
            </div>
        </div>

        <!-- Campos ocultos para el manejo de slides -->
        <input type="hidden" name="current_slide" id="current-slide" value="1">
        <input type="hidden" name="total_questions" id="total-questions" value="1">
    </form>

    <script>
        let currentSlide = 1;
        let totalSlides = 1;

        // Cambiar entre diapositivas
        document.getElementById('slides-list').addEventListener('click', function (event) {
            if (event.target.classList.contains('slide-item')) {
                const slideNumber = event.target.dataset.slide;
                showSlide(slideNumber);
            }
        });

        function showSlide(slideNumber) {
            document.querySelectorAll('.slide-item').forEach(item => item.classList.remove('active'));
            document.querySelectorAll('.slide-content').forEach(content => content.style.display = 'none');

            document.querySelector(`#slide-content-${slideNumber}`).style.display = 'block';
            document.querySelector(`[data-slide="${slideNumber}"]`).classList.add('active');

            document.getElementById('current-slide').value = slideNumber;
            currentSlide = slideNumber;
        }

        // Añadir una nueva diapositiva
        document.getElementById('add-slide').addEventListener('click', function () {
            totalSlides++;
            currentSlide = totalSlides;

            // Agregar nuevo ítem en la sidebar
            const newSlideItem = document.createElement('li');
            newSlideItem.classList.add('slide-item');
            newSlideItem.dataset.slide = totalSlides;
            newSlideItem.textContent = `Pregunta ${totalSlides}`;
            document.getElementById('slides-list').appendChild(newSlideItem);

            // Crear nuevo contenido de diapositiva
            const newSlideContent = document.createElement('div');
            newSlideContent.classList.add('slide-content');
            newSlideContent.id = `slide-content-${totalSlides}`;
            newSlideContent.innerHTML = `
                <div class="mb-3">
                    <input type="text" name="slides[${totalSlides}][question]" class="form-control question-input" placeholder="Ingresa Aquí tu Pregunta">
                </div>
                <div class="mb-3 text-center">
                    <label for="slides_${totalSlides}_image" class="btn btn-light border">Cargar Imagen</label>
                    <input type="file" name="slides[${totalSlides}][image]" id="slides_${totalSlides}_image" class="d-none">
                </div>
                <div class="answers">
                    <div class="answer-box" data-color="red">
                        <input type="checkbox" name="slides[${totalSlides}][correct_answers][]" value="0" class="checkbox">
                        <input type="text" name="slides[${totalSlides}][answers][]" class="form-control answer-input" placeholder="Primera respuesta" style="border: none; background: transparent;">
                    </div>
                    <div class="answer-box" data-color="blue">
                        <input type="checkbox" name="slides[${totalSlides}][correct_answers][]" value="1" class="checkbox">
                        <input type="text" name="slides[${totalSlides}][answers][]" class="form-control answer-input" placeholder="Segunda respuesta" style="border: none; background: transparent;">
                    </div>
                    <div class="answer-box" data-color="yellow">
                        <input type="checkbox" name="slides[${totalSlides}][correct_answers][]" value="2" class="checkbox">
                        <input type="text" name="slides[${totalSlides}][answers][]" class="form-control answer-input" placeholder="Tercera respuesta" style="border: none; background: transparent;">
                    </div>
                    <div class="answer-box" data-color="green">
                        <input type="checkbox" name="slides[${totalSlides}][correct_answers][]" value="3" class="checkbox">
                        <input type="text" name="slides[${totalSlides}][answers][]" class="form-control answer-input" placeholder="Cuarta respuesta" style="border: none; background: transparent;">
                    </div>
                </div>
            `;

            document.getElementById('content-area').appendChild(newSlideContent);
            showSlide(totalSlides);
            document.getElementById('total-questions').value = totalSlides;
        });

        // Eliminar la diapositiva actual
        document.getElementById('delete-slide').addEventListener('click', function () {
            if (totalSlides > 1) {
                // Eliminar la diapositiva actual
                document.getElementById(`slide-content-${currentSlide}`).remove();
                document.querySelector(`[data-slide="${currentSlide}"]`).remove();

                // Reorganizar el contenido
                totalSlides--;
                document.getElementById('total-questions').value = totalSlides;

                if (currentSlide > totalSlides) {
                    currentSlide = totalSlides;
                }

                showSlide(currentSlide);
            } else {
                alert('No puedes eliminar la última diapositiva');
            }
        });

        // Manejo de selección de respuestas
        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('answer-box')) {
                const answerBoxes = event.target.parentElement.querySelectorAll('.answer-box');
                answerBoxes.forEach(box => box.classList.remove('active'));
                event.target.classList.add('active');
            }
        });
    </script>
</body>

</html>
