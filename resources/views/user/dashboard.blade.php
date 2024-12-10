@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <!-- Sección de Carrusel de Gamificación -->
    <div class="position-relative">
        <!-- Imagen de fondo -->
        <img 
            src="assets/img/Inicio/FondoPaginaPrincipal.jpg" 
            class="img-fluid w-100 h-auto border-radius-lg" 
            alt="Imagen de fondo">

        <!-- Texto encima de la imagen -->
        <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
            <!-- Título -->
            <h2 class="text-primary h1" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); font-family: 'Comic Sans MS', cursive, sans-serif; line-height: 1.5;">
                Transforma el aprendizaje con <br>diversión y competencia.
            </h2>
            <!-- Frase -->
            <p class="lead text-secondary" style="font-family: 'Comic Sans MS', cursive, sans-serif; line-height: 1.5;">
                Nuestra herramienta gamificada revoluciona la evaluación educativa, <br> motivando a estudiantes y facilitando la enseñanza a los profesores.
            </p>
            <!-- Botón para jugar -->
            <button class="btn btn-primary mt-3" id="openModalButton">¿Quieres jugar?</button>
        </div>
    </div>

    <!-- Modal (formulario para ingresar la URL) -->
    <div id="gameModal" class="modal d-none">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Botón de cierre "X" -->
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2" id="closeModalButton" aria-label="Close"></button>
                <div class="modal-header">
                    <h5 class="modal-title">Ingresa tu URL para jugar</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('tuRuta') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="gameUrl" class="form-label">URL del juego:</label>
                    <input type="url" 
                           class="form-control" 
                           id="gameUrl" 
                           name="gameUrl" 
                           placeholder="Ingrese URL del juego" 
                           required>
                    @error('gameUrl')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" 
                        class="btn btn-primary w-100"
                        style="background: linear-gradient(310deg, #1d47c1, #a848d0); border: none;">
                    Jugar
                </button>
            </form>
                </div>
            </div>
        </div>
    </div>


<style>
    .modal {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1050;
    }

    .modal-dialog {
        background: white;
        border-radius: 8px;
        max-width: 500px;
        padding: 20px;
        position: relative;
    }

    .d-none {
        display: none;
    }
</style>

<script>
    document.getElementById('openModalButton').addEventListener('click', function () {
        document.getElementById('gameModal').classList.remove('d-none');
    });

    document.getElementById('closeModalButton').addEventListener('click', function () {
        document.getElementById('gameModal').classList.add('d-none');
    });

    // Cierra el modal al hacer clic fuera del contenido
    document.getElementById('gameModal').addEventListener('click', function (event) {
        if (event.target === this) {
            this.classList.add('d-none');
        }
    });
</script>


    <div class="d-flex align-items-center bg-light p-4" style="border-radius: 8px;">
    <!-- Texto a la izquierda -->
    <div class="flex-grow-1 me-4">
        <h2 class="mb-3" style="color: #2a2a2a;">Aprende y compite con herramientas que motivan el éxito</h2>
        <p style="color: #2a2a2a;">
            Descubre cómo la gamificación revoluciona la educación. Aprende, compite y crece con herramientas diseñadas para motivar y conectar.
        </p>
    </div>
    <!-- Video a la derecha -->
    <div class="flex-shrink-0" style="width: 45%;">
        <iframe src="https://www.youtube.com/embed/T5SGqP_h_lE?si=9ZsoYsrIrFVmzEir" 
                title="Video de Gamificación" 
                class="w-100" 
                style="height: 300px; border-radius: 8px; border: none;" 
                allowfullscreen>
        </iframe>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center mb-4" style="color: #2a2a2a;">¿Cómo la gamificación transforma el aprendizaje?</h2>
    <div class="row align-items-center mb-4">
        <!-- Tarjeta izquierda -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Participación activa</h5>
                    <p class="card-text">
                    La gamificación anima a los estudiantes a comprometerse activamente con los contenidos a través de retos, competiciones y recompensas.
                    </p>
                </div>
            </div>
        </div>
        <!-- Espacio para la imagen -->
        <div class="col-md-6 text-center">
            <img src="assets/img/Inicio/ParticipacionActiva.png" alt="Active Participation" class="img-fluid" style="max-height: 200px;">
        </div>
    </div>
    <div class="row align-items-center mb-4">
        <!-- Espacio para la imagen -->
        <div class="col-md-6 text-center order-md-2">
            <img src="assets/img/Inicio/MayorMotivacion.png" alt="Increased Motivation" class="img-fluid" style="max-height: 200px;">
        </div>
        <!-- Tarjeta derecha -->
        <div class="col-md-6 order-md-1">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Mayor motivación</h5>
                    <p class="card-text">
                    Gracias a las recompensas y los logros, los alumnos se sienten más inspirados para alcanzar sus objetivos y disfrutan del proceso.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center mb-4">
        <!-- Tarjeta izquierda -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Mayor retención de conocimientos</h5>
                    <p class="card-text">
                    Los juegos interactivos ayudan a reforzar los conceptos, mejorando la memoria y la comprensión a lo largo del tiempo.
                    </p>
                </div>
            </div>
        </div>
        <!-- Espacio para la imagen -->
        <div class="col-md-6 text-center">
            <img src="assets/img/Inicio/MayorRetencionConocimientos.png" alt="Enhanced Knowledge Retention" class="img-fluid" style="max-height: 200px;">
        </div>
    </div>
    <div class="row align-items-center mb-4">
        <!-- Espacio para la imagen -->
        <div class="col-md-6 text-center order-md-2">
            <img src="assets/img/Inicio/ImpulsoCreatividad.png" alt="Creativity Boost" class="img-fluid" style="max-height: 200px;">
        </div>
        <!-- Tarjeta derecha -->
        <div class="col-md-6 order-md-1">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Impulso de la creatividad</h5>
                    <p class="card-text">
                    Los alumnos piensan con originalidad y desarrollan habilidades de resolución de problemas mientras exploran contenidos gamificados.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>




  
</div>
@endsection