@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <!-- Sección de Pruebas Creadas -->
    <h2 class="mb-4">Pruebas Creadas</h2>
    <div class="scroll-container position-relative">
        <button class="scroll-btn left-btn">&#10094;</button>
        <div class="scrollable-content">
            @for ($i = 0; $i < 10; $i++) <!-- Ajusta el número de pruebas -->
            <div class="card shadow-lg border-0 m-2" style="background-color: #f8f9fa; width: 200px; display: inline-block;">
                <div class="card-body">
                    <span class="badge badge-primary mb-2">15 min</span>
                    <h5 class="card-title">Título {{ $i + 1 }}</h5>
                    <p class="card-text">Descripción {{ $i + 1 }}</p>
                </div>
            </div>
            @endfor
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
        width: calc(100% - 40px); /* Ajusta según el tamaño de las flechas */
        scrollbar-width: none; /* Oculta la barra en Firefox */
        -ms-overflow-style: none; /* Oculta la barra en IE y Edge */
    }
    .scrollable-content::-webkit-scrollbar {
        display: none; /* Oculta la barra en Chrome, Safari y Opera */
    }
    .scroll-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5); /* Fondo con transparencia */
        border: none;
        font-size: 2rem;
        color: white; /* Color de la flecha */
        cursor: pointer;
        z-index: 10;
        padding: 10px; /* Mejora la área clicable */
        border-radius: 50%; /* Hacer las flechas redondas */
        display: none; /* Oculta las flechas inicialmente */
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
