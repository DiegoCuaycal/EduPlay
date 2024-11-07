@extends('layouts.user_type.guest')

@section('content')

<section class="min-vh-100 mb-8">
  <div class="page-header align-items-start min-vh-50 pt-5 pb-11 mx-3 border-radius-lg"
    style="background-image: url('../assets/img/Fecyt/FecytFondo.jpg');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 text-center mx-auto">
          <h1 class="text-white mb-2 mt-5">¡Bienvenido!</h1>
          <p class="text-lead text-white">Utilice estos increíbles formularios para iniciar sesión o crear una nueva
            cuenta en su proyecto de forma gratuita.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
      <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
        <div class="card z-index-0">
          <div class="card-header text-center pt-4">
            <h5>Registrese </h5>
          </div>

          <!--<div class="row px-xl-5 px-sm-4 px-3 justify-content-center"> -->
            <!-- Botón de Microsoft con logo -->
            <!--
            <div class="col-3 text-center"> 
              <a class="btn btn-outline-light w-100 d-flex justify-content-center align-items-center"
                href="javascript:;">
            -->
                <!-- Logo de Microsoft (cuatro cuadros de colores) -->
                <!--
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none">
                  <rect width="10" height="10" x="1" y="1" fill="#F25022"></rect>
                  <rect width="10" height="10" x="13" y="1" fill="#7FBA00"></rect>
                  <rect width="10" height="10" x="1" y="13" fill="#00A4EF"></rect>
                  <rect width="10" height="10" x="13" y="13" fill="#FFB900"></rect>
                </svg>
              </a>
            </div>
          -->

          <div class="card-body">
            <form role="form text-left" method="POST" action="/register">
              @csrf
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nombre" name="name" id="name" aria-label="Name"
                  aria-describedby="name" value="{{ old('name') }}">
                @error('name')
          <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" placeholder="Correo electrónico" name="email" id="email"
                  aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                @error('email')
          <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password"
                  aria-label="Password" aria-describedby="password-addon">
                @error('password')
          <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror
              </div>
              <div class="form-check form-check-info text-left">
                <input class="form-check-input" type="checkbox" name="agreement" id="flexCheckDefault" checked>
                <label class="form-check-label" for="flexCheckDefault">
                  Acepto los <a href="javascript:;" class="text-dark font-weight-bolder">Términos y Condiciones</a>
                </label>
                @error('agreement')
          <p class="text-danger text-xs mt-2">Primero, acepte los Términos y Condiciones, luego intente registrarse nuevamente.
          </p>
        @enderror
              </div>
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">únete</button>
              </div>
              <p class="text-sm mt-3 mb-0">Ya tienes una cuenta? <a href="login"
                  class="text-dark font-weight-bolder">Inicia sesión</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection