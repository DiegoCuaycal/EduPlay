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

    <!-- Admin Bar -->
    <div class="admin-bar d-flex justify-content-between align-items-center">
        <input type="text" class="form-control" placeholder="Ingrese el Título de Su prueba" style="max-width: 300px;">
        <div>
            <button class="btn btn-secondary">Salir</button>
            <button class="btn btn-primary">Guardar</button>
        </div>
    </div>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h5>Preguntas</h5>
            <ul class="list-unstyled" id="slides-list">
                <!-- Diapositiva predeterminada (no se puede eliminar) -->
                <li class="slide-item active" data-slide="1">Pregunta 1 (Por defecto)</li>
            </ul>
            <button class="btn btn-primary w-100" id="add-slide">Añadir Página</button>
        </div>

        <!-- Content -->
        <div class="content flex-grow-1" id="content-area">
            <!-- El contenido de las diapositivas será dinámico -->
            <div id="slide-content-1">
                <div class="mb-3">
                    <input type="text" class="form-control question-input" placeholder="Ingresa Aquí tu Pregunta">
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-light border">Cargar Imagen</button>
                </div>
                <div class="answers">
                    <div class="answer-box" data-color="red">
                        <input type="checkbox" class="checkbox">
                        <input type="text" class="form-control answer-input" placeholder="Primera respuesta" style="border: none; background: transparent;">
                    </div>
                    <div class="answer-box" data-color="blue">
                        <input type="checkbox" class="checkbox">
                        <input type="text" class="form-control answer-input" placeholder="Segunda respuesta" style="border: none; background: transparent;">
                    </div>
                    <div class="answer-box" data-color="yellow">
                        <input type="checkbox" class="checkbox">
                        <input type="text" class="form-control answer-input" placeholder="Tercera respuesta" style="border: none; background: transparent;">
                    </div>
                    <div class="answer-box" data-color="green">
                        <input type="checkbox" class="checkbox">
                        <input type="text" class="form-control answer-input" placeholder="Cuarta respuesta" style="border: none; background: transparent;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentSlide = 1; // Mantiene un control de la diapositiva actual
        let slidesData = {1: getSlideContent(1)}; // Datos temporales de las diapositivas

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
        document.getElementById('add-slide').addEventListener('click', function() {
            const slidesList = document.getElementById('slides-list');
            const newSlideNumber = Object.keys(slidesData).length + 1; // Obtener el número de la nueva diapositiva

            // Crear una nueva diapositiva en la lista
            const newSlide = document.createElement('li');
            newSlide.classList.add('slide-item');
            newSlide.dataset.slide = newSlideNumber;
            newSlide.textContent = `Pregunta ${newSlideNumber}`;
            newSlide.addEventListener('click', function() {
                switchToSlide(newSlideNumber);
            });
            slidesList.appendChild(newSlide);

            // Inicializar contenido vacío para la nueva diapositiva
            slidesData[newSlideNumber] = `
                <div class="mb-3">
                    <input type="text" class="form-control question-input" placeholder="Ingresa Aquí tu Pregunta">
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-light border">Cargar Imagen</button>
                </div>
                <div class="answers">
                    <div class="answer-box" data-color="red">
                        <input type="checkbox" class="checkbox">
                        <input type="text" class="form-control answer-input" placeholder="Primera respuesta" style="border: none; background: transparent;">
                    </div>
                    <div class="answer-box" data-color="blue">
                        <input type="checkbox" class="checkbox">
                        <input type="text" class="form-control answer-input" placeholder="Segunda respuesta" style="border: none; background: transparent;">
                    </div>
                    <div class="answer-box" data-color="yellow">
                        <input type="checkbox" class="checkbox">
                        <input type="text" class="form-control answer-input" placeholder="Tercera respuesta" style="border: none; background: transparent;">
                    </div>
                    <div class="answer-box" data-color="green">
                        <input type="checkbox" class="checkbox">
                        <input type="text" class="form-control answer-input" placeholder="Cuarta respuesta" style="border: none; background: transparent;">
                    </div>
                </div>
            `;
            
            // Cambiar automáticamente a la nueva diapositiva
            switchToSlide(newSlideNumber);
        });

        // Función para obtener el contenido de una diapositiva
        function getSlideContent(slideNumber) {
            const question = document.querySelector('#content-area .question-input')?.value || '';
            const answers = Array.from(document.querySelectorAll('#content-area .answer-input')).map(input => input.value);
            const checkboxes = Array.from(document.querySelectorAll('#content-area .checkbox')).map(checkbox => checkbox.checked);
            
            return { question, answers, checkboxes };
        }

        // Función para cargar el contenido de una diapositiva
        function loadSlideContent(slideNumber) {
            const content = slidesData[slideNumber];

            // Limpiar el área de contenido y cargar el contenido de la diapositiva
            const contentArea = document.getElementById('content-area');
            contentArea.innerHTML = `
                <div class="mb-3">
                    <input type="text" class="form-control question-input" placeholder="Ingresa Aquí tu Pregunta" value="${content.question}">
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-light border">Cargar Imagen</button>
                </div>
                <div class="answers">
                    ${['red', 'blue', 'yellow', 'green'].map((color, index) => `
                        <div class="answer-box" data-color="${color}">
                            <input type="checkbox" class="checkbox" ${content.checkboxes[index] ? 'checked' : ''}>
                            <input type="text" class="form-control answer-input" placeholder="Respuesta ${index + 1}" style="border: none; background: transparent;" value="${content.answers[index]}">
                        </div>
                    `).join('')}
                </div>
            `;

            // Vuelve a añadir la funcionalidad de resaltar respuestas
            addAnswerBoxEvents();
        }

        // Función para agregar la funcionalidad de cambiar el color de las respuestas
        function addAnswerBoxEvents() {
            document.querySelectorAll('.answer-box').forEach(box => {
                box.addEventListener('click', function() {
                    this.classList.toggle('active');
                });
            });
        }

        // Inicializar eventos en las respuestas de la primera diapositiva
        addAnswerBoxEvents();
    </script>

</body>
</html>
