@extends('layouts.user_type.auth')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
    <div class="card-header bg-light text-dark shadow rounded" style="background-color: #f0f4f7; border: 1px solid #d1d9df;">
    <div class="d-flex align-items-center">
        <i class="bi bi-check-circle-fill text-success fs-3 me-3"></i>
        <h3 class="mb-0 fw-bold">Detalles de la Prueba: 
            <span class="text-primary">{{ $prueba->titulo }}</span>
        </h3>
    </div>
</div>



        <div class="card-body" style="background: linear-gradient(to bottom, #ffffff, #f0f0f0); color: #333;">
            <!-- Información general de la prueba -->
            <div class="alert alert-info mb-4"
                style="background: linear-gradient(to bottom, #d9ecf2, #e8f4fc); border-color: #b8daff; color: #0c5460;">
                <div class="d-flex align-items-center">
                    <i class="fas fa-info-circle me-2"></i>
                    <div>
                        <h5 class="alert-heading">Información de la Prueba</h5>
                        <p class="mb-0">Aquí puedes ver todos tus intentos realizados para esta prueba.</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Lista de intentos -->
        <div class="list-group">
            @foreach($intentos as $intento)
                <div class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-star text-warning me-2"></i>
                                <h5 class="mb-1">Puntaje: {{ $intento->puntaje }}</h5>
                            </div>
                            <div class="d-flex align-items-center text-muted">
                                <i class="far fa-clock me-2"></i>
                                <small>Completado el: {{ $intento->created_at->format('d-m-Y H:i') }}</small>
                            </div>
                        </div>
                        <div>
                            <span class="badge bg-success rounded-pill">
                                <i class="fas fa-check me-1"></i>
                                Completado
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer con botones de acción -->
    <div class="card-footer bg-light">
        <div class="d-flex justify-content-between">
            <a href="{{ route('historial') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i>
                Volver
            </a>
            <a href="{{ route('dashboarduser') }}" class="btn btn-primary">
                <i class="fas fa-redo me-1"></i>
                Realizar Nuevo Intento
            </a>
        </div>
    </div>
</div>
</div>

<!-- Asegúrate de incluir Font Awesome en tu layout -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection