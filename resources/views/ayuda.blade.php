
@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary mb-4" style="font-weight: bold; font-size: 2.5rem;">¿ Cómo jugar ?</h2>
    <p class="text-center text-muted mb-4" style="font-size: 1.2rem;">Aquí te explicamos cómo se juega y ganas puntos al contestar rápido y correctamente.</p>
    <div class="card mt-3 shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-white text-center">
            <h5 class="text-white">Instrucciones</h5>
        </div>
        <div class="card-body">
            <div class="card mb-3 mx-auto" style="max-width: 720px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assets/img/Ayuda/Codigo.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Paso 1</h5>
                            <p class="card-text">Ingresa al juego con el código proporcionado.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 mx-auto" style="max-width: 720px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assets/img/Ayuda/PreuntasRespuestas.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Paso 2</h5>
                            <p class="card-text">Lee la pregunta y selecciona la respuesta lo más rápido posible.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 mx-auto" style="max-width: 720px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assets/img/Ayuda/RespuestaCorrecta.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Paso 3</h5>
                            <p class="card-text">Responde correctamente para ganar más puntos.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 mx-auto" style="max-width: 720px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assets/img/Ayuda/PuntosExtras.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Paso 4</h5>
                            <p class="card-text">Gana puntos extra si tienes una racha de respuestas correctas.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 mx-auto" style="max-width: 720px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assets/img/Ayuda/Final.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Paso 5</h5>
                            <p class="card-text">¡El jugador con más puntos al final gana!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
