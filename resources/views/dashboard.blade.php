@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <!-- Sección de Carrusel de Gamificación -->
<h2 class="mb-4">Gamificación</h2>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1537511446984-935f663eb1f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>¡Estudia y gana!</h5>
                <p>“La práctica hace al maestro. ¡Aprovecha cada oportunidad!”</p>
                <p><strong>Desafío:</strong> Completa la prueba en menos de 10 minutos y obtén un badge especial.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Prepárate para el éxito</h5>
                <p>“Cada error es una oportunidad para aprender. ¡No te rindas!”</p>
                <p><strong>Tip:</strong> Revisa tus notas antes de comenzar la prueba.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1552793494-111afe03d0ca?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>¡Hazlo por ti!</h5>
                <p>“El éxito es la suma de pequeños esfuerzos repetidos día tras día.”</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- CSS para el fondo oscuro y estilo de las letras -->
<style>
.carousel-caption {
    background-color: rgba(0, 0, 0, 0.7); /* Fondo oscuro con opacidad */
    padding: 15px; /* Añadir un poco de espacio alrededor del texto */
    border-radius: 5px; /* Opcional: bordes redondeados */
    color: white; /* Color de texto blanco */
}
</style>

    <div class="container text-center">
        <h2 class="mb-4 display-4 text-primary">Gamificación</h2>
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

    <!-- Sección de Pruebas Creadas -->
    <h2 class="mb-4 mt-5">Pruebas Creadas</h2>
    <div class="scroll-container position-relative">
        <button class="scroll-btn left-btn">&#10094;</button>
        <div class="scrollable-content">
            @foreach ($pruebas as $prueba)
                <div class="card shadow-lg border-0 m-2"
                    style="background-color: #f8f9fa; width: 200px; display: inline-block;">
                    <div class="card-body">
                        <span class="badge badge-primary mb-2">{{ $prueba->created_at->diffForHumans() }}</span>
                        <h5 class="card-title">{{ $prueba->titulo }}</h5>
                        <p class="card-text">Descripción de la prueba</p>
                        <a href="{{ route('pruebas.show', $prueba->id) }}" class="btn btn-primary">Ver Prueba</a>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="scroll-btn right-btn">&#10095;</button>
    </div>

    <!-- Sección de Pruebas Realizadas -->
    <h2 class="mb-4 mt-5">Pruebas Realizadas</h2>
    <div class="scroll-container position-relative">
        <button class="scroll-btn left-btn">&#10094;</button>
        <div class="scrollable-content">
            @for ($i = 0; $i < 10; $i++) <!-- Ajusta el número de pruebas -->
            <div class="card shadow-lg border-0 m-2" style="background-color: #f1f3f4; width: 200px; display: inline-block;">
                <div class="card-body">
                    <span class="badge badge-secondary mb-2">15 min</span>
                    <h5 class="card-title">Título {{ $i + 1 }}</h5>
                    <p class="card-text">Descripción {{ $i + 1 }}</p>
                <div class="card shadow-lg border-0 m-2"
                    style="background-color: #f1f3f4; width: 200px; display: inline-block;">
                    <div class="card-body">
                        <span class="badge badge-secondary mb-2">15 min</span>
                        <h5 class="card-title">Título{{ $i + 1 }}</h5>
                        <p class="card-text">Descripción{{ $i + 1 }}</p>
                    </div>
                </div>
            @endfor
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
