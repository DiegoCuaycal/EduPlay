@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h2>Realizar Prueba: {{ $prueba->titulo }}</h2>
    <form action="{{ route('realizar-prueba.store', $prueba->id) }}" method="POST">
        @csrf
        @foreach ($prueba->preguntas as $pregunta)
            <h5>{{ $pregunta->texto }}</h5>
            @foreach ($pregunta->respuestas as $respuesta)
                <label>
                    <input type="radio" name="respuesta_{{ $pregunta->id }}" value="{{ $respuesta->id }}">
                    {{ $respuesta->texto }}
                </label>
            @endforeach
        @endforeach
        <button type="submit">Finalizar Prueba</button>
    </form>
    
</div>
@endsection
