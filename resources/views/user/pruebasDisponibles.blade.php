@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-5">
    <h2>Pruebas Disponibles</h2>
    
    <!-- Filtro de búsqueda (opcional) -->
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Buscar prueba..." id="searchTest">
        </div>
    </div>

    <!-- Lista de Pruebas Disponibles -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Cantidad de Preguntas</th>
                    <th>Nivel de Dificultad</th>
                    <th>Tiempo Estimado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Matemáticas</td>
                    <td>20</td>
                    <td>Fácil</td>
                    <td>30 minutos</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Realizar</button>
                    </td>
                </tr>
                <tr>
                    <td>Ciencias</td>
                    <td>15</td>
                    <td>Intermedio</td>
                    <td>45 minutos</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Realizar</button>
                    </td>
                </tr>
                <tr>
                    <td>Historia</td>
                    <td>10</td>
                    <td>Difícil</td>
                    <td>20 minutos</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Realizar</button>
                    </td>
                </tr>
                <!-- Agrega más filas según sea necesario -->
            </tbody>
        </table>
    </div>

    <!-- Paginación (opcional) -->
    <div class="d-flex justify-content-center mt-4">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
    </div>
</div>
@endsection
