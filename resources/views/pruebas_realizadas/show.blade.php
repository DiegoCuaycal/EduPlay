@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h1>Intentos para {{ $prueba->titulo }}</h1>
    <div class="mb-3">
        <h2>Podio</h2>
        <ul>
            @foreach ($intentosFiltrados->take(3) as $index => $intento)
                <li>
                    <strong>#{{ $index + 1 }}</strong> 
                    {{ $intento->user->name ?? 'Usuario desconocido' }} - {{ $intento->puntaje }} puntos
                </li>
            @endforeach
        </ul>
    </div>
    <h2>Intentos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Puntaje</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($intentosFiltrados as $intento)
                <tr>
                    <td>{{ $intento->user->name ?? 'Usuario desconocido' }}</td>
                    <td>{{ $intento->puntaje }}</td>
                    <td>{{ $intento->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <!-- Footer con botones de acción -->
    <div class="card-footer bg-light">
        <div class="d-flex justify-content-between">
            <a href="{{ route('historial') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i>
                Volver
            </a>            
        </div>
    </div>
</div>
</div>

<!-- Asegúrate de incluir Font Awesome en tu layout -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection