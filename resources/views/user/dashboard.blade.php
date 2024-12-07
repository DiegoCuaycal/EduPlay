@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <!-- Sección de Carrusel de Gamificación -->
    <div class="container text-center my-5 py-4 bg-light rounded shadow-sm">
        <h2 class="mb-4 display-4 text-primary" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); font-family: 'Comic Sans MS', cursive, sans-serif;">
            Transforma el aprendizaje con diversión y competencia.
        </h2>
        <p class="lead text-secondary" style="font-family: 'Comic Sans MS', cursive, sans-serif;">
        Nuestra herramienta gamificada revoluciona la evaluación educativa, motivando a estudiantes y facilitando la enseñanza a los profesores."
        </p>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1537511446984-935f663eb1f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>¡Estudia y gana!</h5>
                    <p>“La práctica hace al maestro. ¡Aprovecha cada oportunidad!”</p>
                    <p><strong>Desafío:</strong> Completa la prueba en menos de 10 minutos y obtén un badge especial.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Prepárate para el éxito</h5>
                    <p>“Cada error es una oportunidad para aprender. ¡No te rindas!”</p>
                    <p><strong>Tip:</strong> Revisa tus notas antes de comenzar la prueba.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1552793494-111afe03d0ca?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>¡Hazlo por ti!</h5>
                    <p>“El éxito es la suma de pequeños esfuerzos repetidos día tras día.”</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
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