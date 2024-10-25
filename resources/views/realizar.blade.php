@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h2>Realizar Prueba: {{ $prueba->titulo }}</h2>
    <form action="#">
        @foreach ($prueba->preguntas as $pregunta)
            <div class="mb-4">
                <h5>{{ $pregunta->texto }}</h5>
                @foreach ($pregunta->respuestas as $respuesta)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="respuesta_{{ $pregunta->id }}" id="respuesta_{{ $respuesta->id }}">
                        <label class="form-check-label" for="respuesta_{{ $respuesta->id }}">
                            {{ $respuesta->texto }}
                        </label>
                    </div>
                @endforeach
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection
