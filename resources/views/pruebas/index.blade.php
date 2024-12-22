@extends('layouts.user_type.auth')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Listado de Pruebas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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

    <style>
        .table-striped tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-primary i {
            margin-right: 5px;
        }

        .titulo-decorado {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .titulo-decorado i {
            color: #007bff;
        }
    </style>
</head>

<body class="container mt-4">


    <div style="text-align: center; margin-top: 20px;">
        <!-- Título principal con ícono -->
        <h1
            style="color: #FF5733; font-weight: bold; font-size: 2.8rem; position: relative; display: inline-block; padding: 20px;">
            <span style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); z-index: -1;">
                <i class="bi bi-star-fill" style="font-size: 10rem; color: #FAD7A0; opacity: 0.2;"></i>
            </span>
            <i class="fas fa-trophy" style="color: #FFC300;"></i> Listado de Pruebas
        </h1>

        <!-- Subtítulo -->
        <p style="color: #566573; font-size: 1.2rem; font-style: italic; margin-top: 10px;">
            Gestiona tus pruebas con estilo y eficiencia
        </p>

        <!-- Barra decorativa -->
        <hr
            style="border: none; height: 5px; background: linear-gradient(to right, #FF5733, #FFC300); border-radius: 5px; margin: 20px auto; width: 70%;">
    </div>




    <!-- Tabla de pruebas -->
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th><i class="fas fa-hashtag"></i> ID</th>
                <th><i class="fas fa-file-alt"></i> Título de la Prueba</th>
                <th><i class="fas fa-cogs"></i> Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pruebas as $prueba)
                <tr>
                    <td>{{ $prueba->id }}</td>
                    <td>{{ $prueba->titulo }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" onclick="togglePreguntas({{ $prueba->id }})">
                            <i class="fas fa-eye"></i> Ver Preguntas
                        </button>
                    </td>
                </tr>

                <!-- Contenedor de Preguntas -->
                <tr class="preguntas" id="preguntas-{{ $prueba->id }}" style="display: none;">
                    <td colspan="3">
                        <table class="table table-sm table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th><i class="fas fa-hashtag"></i> ID</th>
                                    <th><i class="fas fa-question"></i> Texto</th>
                                    <th><i class="fas fa-cogs"></i> Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prueba->preguntas as $pregunta)
                                    <tr>
                                        <td>{{ $pregunta->id }}</td>
                                        <td>{{ $pregunta->texto }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm" onclick="toggleRespuestas({{ $pregunta->id }})">
                                                <i class="fas fa-eye"></i> Ver Respuestas
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Contenedor de Respuestas -->
                                    <tr class="respuestas" id="respuestas-{{ $pregunta->id }}" style="display: none;">
                                        <td colspan="3">
                                            <table class="table table-sm table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th><i class="fas fa-hashtag"></i> ID</th>
                                                        <th><i class="fas fa-comment"></i> Texto</th>
                                                        <th><i class="fas fa-check-circle"></i> Es Correcta</th>
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

    <!-- Agregar Bootstrap JS y Font Awesome -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

@endsection