@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h2 class="mb-4 mt-5 text-center bg-primary text-white p-3">Pruebas Completadas</h2>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Título</th>
                    <th scope="col">Último Puntaje</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pruebasRealizadas as $pruebaRealizada)
                <tr>
                    <td>{{ $pruebaRealizada->created_at->diffForHumans() }}</td>
                    <td>{{ $pruebaRealizada->prueba->titulo }}</td>
                    <td>{{ $pruebaRealizada->puntaje }}</td>
                    <td>
                        <span>Autor</span>
                        <div class="stats">
                            <small>Posted on {{ $pruebaRealizada->created_at->format('d M Y') }}</small>
                        </div>
                    </td>
                    <td>
                        <button 
                            class="btn btn-primary ver-detalles" 
                            data-id="{{ $pruebaRealizada->prueba->id }}"
                            data-url="{{ route('pruebas.realizadas.show', $pruebaRealizada->prueba->id) }}"
                        >
                            Ver Detalles
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Toast para la alerta -->
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100;">
    <div id="info-toast" class="alert alert-info alert-dismissible fade" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text"><strong>Info!</strong> Redirigiendo a los detalles...</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Ocultar el toast al cargar la página
    const toastElement = document.getElementById('info-toast');
    toastElement.classList.remove('show');
    
    // Obtener todos los botones de ver detalles
    const botonesVerDetalles = document.querySelectorAll('.ver-detalles');
    
    // Agregar evento click a cada botón
    botonesVerDetalles.forEach(function(boton) {
        boton.addEventListener('click', function() {
            // Obtener la URL de los datos del botón
            const url = this.dataset.url;
            
            // Mostrar el toast
            toastElement.classList.add('show');
            
            // Configurar el temporizador para ocultar el toast y redirigir
            setTimeout(function() {
                toastElement.classList.remove('show');
                window.location.href = url;
            }, 2000);
        });
    });

    // Asegurarse de que el toast esté oculto cuando se usa el botón de retroceso
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            // La página se cargó desde el caché del navegador (botón de retroceso)
            toastElement.classList.remove('show');
        }
    });

    // Agregar evento al botón de cerrar del toast
    const closeButton = toastElement.querySelector('.btn-close');
    if (closeButton) {
        closeButton.addEventListener('click', function() {
            toastElement.classList.remove('show');
        });
    }
});
</script>
@endsection
