@extends('layouts.user_type.auth')

@section('content')
<div class="container">
<h2 class="mb-4 mt-5 text-center">Pruebas Completadas</h2>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
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
              <a href="{{ route('pruebas.realizadas.show', $pruebaRealizada->prueba->id) }}" class="btn btn-primary">Ver Detalles</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection


