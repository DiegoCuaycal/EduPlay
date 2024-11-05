@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Historial de Pruebas</h2>
    
    <!-- Filtro de búsqueda -->
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Buscar prueba..." id="searchTest">
        </div>
    </div>

    <!-- Tabla de Historial de Pruebas -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Fecha de Realización</th>
                    <th>Puntaje</th>
                    <th>Retroalimentación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Matemáticas</td>
                    <td>01/11/2024</td>
                    <td>85</td>
                    <td>Buen trabajo, sigue así!</td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm">Ver Detalles</a>
                    </td>
                </tr>
                <tr>
                    <td>Ciencias</td>
                    <td>15/10/2024</td>
                    <td>78</td>
                    <td>Necesitas mejorar en la sección de química.</td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm">Ver Detalles</a>
                    </td>
                </tr>
                <tr>
                    <td>Historia</td>
                    <td>22/09/2024</td>
                    <td>90</td>
                    <td>Excelente comprensión de los eventos históricos.</td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm">Ver Detalles</a>
                    </td>
                </tr>
                <!-- Agrega más filas según sea necesario -->
            </tbody>
        </table>
    </div>

    <!-- Paginación (simulada, puedes comentarla si no la necesitas por ahora) -->
    <div class="d-flex justify-content-center">
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

