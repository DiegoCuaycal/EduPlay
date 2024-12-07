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
        </div>
    </div>


  
 
    <!-- Sección de Pruebas Realizadas -->
    <h2 class="mb-4 mt-5 text-center">Pruebas Completadas</h2>

    <div class="scroll-container position-relative">
      <button class="scroll-btn left-btn">&#10094;</button>
      <div class="scrollable-content d-flex">
      @foreach ($pruebasRealizadas as $pruebaRealizada)
        <div class="card m-2 flex-shrink-0" style="width: 18rem;">
        <div class="card-body pt-2">
          <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">
          {{ $pruebaRealizada->created_at->diffForHumans() }}
          </span>
          <a href="javascript:;" class="card-title h5 d-block text-darker">
          {{ $pruebaRealizada->prueba->titulo }}
          </a>
          <p class="card-description mb-4">
          Último Puntaje: {{ $pruebaRealizada->puntaje }}
          </p>
          <div class="author align-items-center">
          <div class="name ps-3">
            <span>Autor</span>
            <div class="stats">
            <small>Posted on {{ $pruebaRealizada->created_at->format('d M Y') }}</small>
            </div>
          </div>
          </div>
          <a href="{{ route('pruebas.realizadas.show', $pruebaRealizada->prueba->id) }}" class="btn btn-primary mt-3">Ver Detalles</a>
        </div>
        </div>
      @endforeach
      </div>
      <button class="scroll-btn right-btn">&#10095;</button>
    </div>

</div>

<!-- CSS -->
<style>
    .scroll-container {
        overflow: hidden;
        white-space: nowrap;
        position: relative;
    }

    .scrollable-content {
        display: inline-block;
        overflow-x: scroll;
        scroll-behavior: smooth;
        width: calc(100% - 40px);
        /* Ajusta según el tamaño de las flechas */
        scrollbar-width: none;
        /* Oculta la barra en Firefox */
        -ms-overflow-style: none;
        /* Oculta la barra en IE y Edge */
    }

    .scrollable-content::-webkit-scrollbar {
        display: none;
        /* Oculta la barra en Chrome, Safari y Opera */
    }

    .scroll-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        /* Fondo con transparencia */
        border: none;
        font-size: 2rem;
        color: white;
        /* Color de la flecha */
        cursor: pointer;
        z-index: 10;
        padding: 10px;
        /* Mejora la área clicable */
        border-radius: 50%;
        /* Hacer las flechas redondas */
        display: none;
        /* Oculta las flechas inicialmente */
    }

    .scroll-btn.show {
        display: block;
    }

    .left-btn {
        left: 0;
    }

    .right-btn {
        right: 0;
    }
</style>

<!-- JavaScript -->
<script>
    document.querySelectorAll('.scroll-container').forEach(container => {
        const leftBtn = container.querySelector('.left-btn');
        const rightBtn = container.querySelector('.right-btn');
        const content = container.querySelector('.scrollable-content');

        // Función para verificar la posición y mostrar/ocultar flechas
        function updateButtons() {
            const maxScrollLeft = content.scrollWidth - content.clientWidth;
            if (content.scrollLeft === 0) {
                leftBtn.classList.remove('show');
            } else {
                leftBtn.classList.add('show');
            }
            if (content.scrollLeft >= maxScrollLeft) {
                rightBtn.classList.remove('show');
            } else {
                rightBtn.classList.add('show');
            }
        }

        // Desplazamiento a la derecha
        rightBtn.addEventListener('click', () => {
            content.scrollBy({ left: 200, behavior: 'smooth' });
        });

        // Desplazamiento a la izquierda
        leftBtn.addEventListener('click', () => {
            content.scrollBy({ left: -200, behavior: 'smooth' });
        });

        // Escuchar el evento de desplazamiento para ocultar/mostrar las flechas
        content.addEventListener('scroll', updateButtons);

        // Inicialización: Verifica las posiciones de las flechas
        updateButtons();
    });
</script>
@endsection