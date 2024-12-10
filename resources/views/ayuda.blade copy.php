@extends('layouts.user_type.auth') 
 
@section('content') 
<div class="container-fluid d-flex justify-content-center align-items-center">
    <div class="row flex-column align-items-center">
        <div class="col-12 text-center mb-4"> 
            <h2 class="text-primary mb-3">Cómo jugar</h2> 
            <p class="text-muted">Aquí te explicamos cómo se juega y ganas puntos al contestar rápido y correctamente.</p> 
        </div>
 
        <!-- Tarjeta 1 --> 
        <div class="col-12 col-md-8 col-lg-6 mb-3"> 
            <div class="card bg-light shadow-sm border-0 h-100"> 
                <div class="row g-0 align-items-center h-100"> 
                    <div class="col-4"> 
                        <img src="assets/img/Ayuda/codigo.jpg" class="img-fluid rounded-start" alt="Paso 1"> 
                    </div> 
                    <div class="col-8"> 
                        <div class="card-body"> 
                            <h5 class="card-title text-primary">Paso 1</h5> 
                            <p class="card-text">Ingresa al juego con el código proporcionado.</p> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div>
 
        <!-- Tarjeta 2 --> 
        <div class="col-12 col-md-8 col-lg-6 mb-3"> 
            <div class="card bg-secondary text-white shadow-sm border-0 h-100"> 
                <div class="row g-0 align-items-center h-100"> 
                    <div class="col-4"> 
                        <img src="assets/img/Ayuda/PreuntasRespuestas.jpg" class="img-fluid rounded-start" alt="Paso 2"> 
                    </div> 
                    <div class="col-8"> 
                        <div class="card-body"> 
                            <h5 class="card-title">Paso 2</h5> 
                            <p class="card-text">Lee la pregunta y selecciona la respuesta lo más rápido posible.</p> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div>
 
        <!-- Tarjeta 3 --> 
        <div class="col-12 col-md-8 col-lg-6 mb-3"> 
            <div class="card bg-info text-white shadow-sm border-0 h-100"> 
                <div class="row g-0 align-items-center h-100"> 
                    <div class="col-4"> 
                        <img src="assets/img/Ayuda/RespuestaCorrecta.jpg" class="img-fluid rounded-start" alt="Paso 3"> 
                    </div> 
                    <div class="col-8"> 
                        <div class="card-body"> 
                            <h5 class="card-title">Paso 3</h5> 
                            <p class="card-text">Responde correctamente para ganar más puntos.</p> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div>
 
        <!-- Tarjeta 4 --> 
        <div class="col-12 col-md-8 col-lg-6 mb-3"> 
            <div class="card bg-success text-white shadow-sm border-0 h-100"> 
                <div class="row g-0 align-items-center h-100"> 
                    <div class="col-4"> 
                        <img src="assets/img/Ayuda/PuntosExtras.jpg" class="img-fluid rounded-start" alt="Paso 4"> 
                    </div> 
                    <div class="col-8"> 
                        <div class="card-body"> 
                            <h5 class="card-title">Paso 4</h5> 
                            <p class="card-text">Gana puntos extra si tienes una racha de respuestas correctas.</p> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div>
 
        <!-- Tarjeta 5 --> 
        <div class="col-12 col-md-8 col-lg-6 mb-3"> 
            <div class="card bg-warning text-dark shadow-sm border-0 h-100"> 
                <div class="row g-0 align-items-center h-100"> 
                    <div class="col-4"> 
                        <img src="assets/img/Ayuda/Final.jpg" class="img-fluid rounded-start" alt="Paso 5"> 
                    </div> 
                    <div class="col-8"> 
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


