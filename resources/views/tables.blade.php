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
                <li class="mb-2" id="slide-template" style="display: none;">
                    <div class="d-flex align-items-center">
                        <img src="path/to/image.jpg" alt="Pregunta" class="img-thumbnail" style="width: 80px; height: 50px;">
                        <span class="ms-2">Nueva Pregunta</span>
                        <button class="btn btn-sm btn-danger ms-auto">🗑</button>
                    </div>
                </li>
            </ul>
            <button class="btn btn-primary w-100" id="add-slide">Añadir Página</button>
        </div>

        <!-- Content -->
        <div class="content flex-grow-1">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Ingresa Aquí tu Pregunta">
            </div>
            <div class="mb-3 text-center">
                <button class="btn btn-light border">Cargar Imagen</button>
            </div>
            <div class="answers">
                <div class="answer-box" data-color="red">
                    <input type="checkbox" class="checkbox">
                    <input type="text" class="form-control" placeholder="Escribe aquí una respuesta" style="border: none; background: transparent;">
                </div>
                <div class="answer-box" data-color="blue">
                    <input type="checkbox" class="checkbox">
                    <input type="text" class="form-control" placeholder="Escribe aquí una respuesta" style="border: none; background: transparent;">
                </div>
                <div class="answer-box" data-color="yellow">
                    <input type="checkbox" class="checkbox">
                    <input type="text" class="form-control" placeholder="Escribe aquí una respuesta" style="border: none; background: transparent;">
                </div>
                <div class="answer-box" data-color="green">
                    <input type="checkbox" class="checkbox">
                    <input type="text" class="form-control" placeholder="Escribe aquí una respuesta" style="border: none; background: transparent;">
                </div>
            </div>
        </div>
    </div>

    <script>
        // Manejo de selección de respuestas
        document.querySelectorAll('.answer-box').forEach(box => {
            const checkbox = box.querySelector('.checkbox');
            const input = box.querySelector('input[type="text"]');

            // Cambiar color cuando el texto se escribe
            input.addEventListener('input', function() {
                if (this.value.trim() !== "") {
                    box.classList.add('active');
                } else {
                    box.classList.remove('active');
                }
            });

            // Mantener color al seleccionar el checkbox
            checkbox.addEventListener('change', function() {
                if (checkbox.checked) {
                    box.classList.add('active');
                } else {
                    box.classList.remove('active');
                }
            });
        });

        // Añadir nueva diapositiva
        document.getElementById('add-slide').addEventListener('click', function() {
            const slidesList = document.getElementById('slides-list');
            const newSlide = document.getElementById('slide-template').cloneNode(true);
            newSlide.style.display = 'block';
            newSlide.removeAttribute('id');
            slidesList.appendChild(newSlide);
        });
    </script>

</body>
</html>
