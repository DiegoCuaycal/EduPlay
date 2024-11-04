@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="row">
        @foreach($pruebas as $prueba)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <!-- Aquí iría la imagen en el futuro -->
                        <div class="rectangulo" style="width:100%;height:150px;background-color:lightgray;"></div>
                        <h5 class="card-title mt-2">{{ $prueba->titulo }}</h5>
                        <p class="card-text">Preguntas: {{ $prueba->preguntas->count() }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('pruebas.show', $prueba->id) }}" class="btn btn-primary">Ver prueba</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
