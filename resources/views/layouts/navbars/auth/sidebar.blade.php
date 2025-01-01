<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
  id="sidenav-main" style="width: 250px; background-color: #e9ecef">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
      aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboarduser') }}">
      <img src="../assets/img/Fecyt/Fecyt.png" class="navbar-brand-img h-100" alt="..."
        style="width: 400px; height: 400; max-height: 250px;">
    </a>
  </div>

  <hr class="horizontal dark mt-0">

  <ul class="navbar-nav">
    <!-- Opciones para el rol 'usuario' -->
    @if (Auth::check() && Auth::user()->hasRole('User'))
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboarduser') ? 'active' : '' }}" href="{{ url('dashboarduser') }}"
      id="inicio-link">
      <div
        class="icon icon-shape icon-sm shadow border-radius-md {{ Request::is('dashboarduser') ? 'bg-primary text-white' : 'bg-white text-dark' }} text-center me-2 d-flex align-items-center justify-content-center">
        <!-- Nuevo icono -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-house-door-fill" viewBox="0 0 16 16">
        <path
          d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
        </svg>
      </div>
      <span class="nav-link-text ms-1">Inicio</span>
      </a>
    </li>



    <div id="loading-overlay" style="display: none;">
      <div class="spinner-grow text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
      </div>
    </div>


    <style>
      #loading-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      /* Fondo oscuro */
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      }

      .spinner-grow {
      width: 4rem;
      height: 4rem;
      }
    </style>

    <script>
      document.getElementById('inicio-link').addEventListener('click', function (e) {
      e.preventDefault(); // Evita la redirección inmediata

      const overlay = document.getElementById('loading-overlay');
      overlay.style.display = 'flex'; // Muestra el overlay

      // Retrasa la redirección por 2 segundos (2000 ms)
      setTimeout(() => {
        window.location.href = e.target.href; // Redirige después del retraso
      }, 2000);
      });


    </script>

    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Centro de Pruebas y Reportes</h6>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('historial') ? 'active' : '' }}" href="{{ url('historial') }}">
      <div
        class="icon icon-shape icon-sm shadow border-radius-md {{ Request::is('historial') ? 'bg-primary text-white' : 'bg-white text-dark' }} text-center me-2 d-flex align-items-center justify-content-center">
        <!-- Icono SVG nuevo -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-record-btn-fill" viewBox="0 0 16 16">
        <path
          d="M0 12V4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2m8-1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
        </svg>
      </div>
      <span class="nav-link-text ms-1">Historial</span>
      </a>
    </li>


    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Cuenta</h6>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ (Request::is('laravel-examples/user-profile') ? 'active' : '') }}"
      href="{{ url('laravel-examples/user-profile') }}">
      <div
        class="icon icon-shape icon-sm shadow border-radius-md {{ (Request::is('laravel-examples/user-profile') ? 'bg-primary text-white' : 'bg-white text-center') }} me-2 d-flex align-items-center justify-content-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle"
        viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
        <path fill-rule="evenodd"
          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
        </svg>
      </div>
      <span class="nav-link-text ms-1">Perfil</span>
      </a>
    </li>

    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Mayor información</h6>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ (Request::is('ayudaUser') ? 'active' : '') }}" href="{{ url('ayudaUser') }}">
      <div
        class="icon icon-shape icon-sm shadow border-radius-md {{ (Request::is('ayudaUser') ? 'bg-primary text-white' : 'bg-white text-center text-dark') }} me-2 d-flex align-items-center justify-content-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-patch-question-fill" viewBox="0 0 16 16">
        <path
          d="M5.933.87a2.89 2.89 0 0 1 4.134 0l.622.638.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01zM7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0m1.602-2.027c.04-.534.198-.815.846-1.26.674-.475 1.05-1.09 1.05-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.7 1.7 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745.336 0 .504-.24.554-.627" />
        </svg>
      </div>
      <span class="nav-link-text ms-1">Ayuda</span>
      </a>
    </li>


  @endif

    <!-- Opciones para el rol 'admin' laravel examples-->
    @if (Auth::check() && Auth::user()->hasRole('Admin'))
    <!--
    <li class="nav-item mt-2">
      <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"></h6>
    </li>
    -->
    <li class="nav-item">
      <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}" href="{{ url('dashboard') }}">
      <div
        class="icon icon-shape icon-sm shadow border-radius-md {{ Request::is('dashboard') ? 'bg-primary text-white' : 'bg-white text-dark' }} text-center me-2 d-flex align-items-center justify-content-center">
        <!-- Nuevo icono -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill"
        viewBox="0 0 16 16">
        <path
          d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
        </svg>
      </div>
      <span class="nav-link-text ms-1">Inicio</span>
      </a>
    </li>


    <li class="nav-item mt-2">
      <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Actividades</h6>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ (Request::is('tables') ? 'active' : '') }}" href="{{ url('tables') }}">
      <div
        class="icon icon-shape icon-sm shadow border-radius-md {{ Request::is('tables') ? 'bg-primary text-white' : 'bg-white text-dark' }} text-center me-2 d-flex align-items-center justify-content-center">
        <!-- Nuevo icono -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
        <path
          d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0" />
        </svg>
      </div>
      <span class="nav-link-text ms-1">Crear Actividades</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ (Request::is('pruebas/cuadros') ? 'active' : '') }}" href="{{ url('pruebas/cuadros') }}">
      <div
        class="icon icon-shape icon-sm shadow border-radius-md {{ Request::is('pruebas/cuadros') ? 'bg-primary text-white' : 'bg-white text-dark' }} text-center me-2 d-flex align-items-center justify-content-center">
        <!-- Nuevo icono -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
        </svg>
      </div>
      <span class="nav-link-text ms-1">Ver Actividades</span>
      </a>
    </li>

    <!--


    <li class="nav-item">
      <a class="nav-link {{ (Request::is('pruebas_realizadas') ? 'active' : '') }}"
      href="{{ url('pruebas-realizadas') }}">
      <div
      class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
      <svg width="12px" height="100%" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink">
      <title>office</title>
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
      <g transform="translate(1716.000000, 291.000000)">
      <g id="office" transform="translate(153.000000, 2.000000)">
      <path class="color-background opacity-6"
      d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
      </path>
      <path class="color-background"
      d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
      </path>
      </g>
      </g>
      </g>
      </g>
      </svg>
      </div>
      <span class="nav-link-text ms-1">Actividades Realizadas</span>
      </a>
    </li>

    -->

    <!--
    <li class="nav-item">
      <a class="nav-link {{ (Request::is('billing') ? 'active' : '') }}" href="{{ url('billing') }}">
      <div
      class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
      <svg width="12px" height="100%" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink">
      <title>credit-card</title>
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
      <g transform="translate(1716.000000, 291.000000)">
      <g transform="translate(453.000000, 454.000000)">
      <path class="color-background opacity-6"
      d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z">
      </path>
      <path class="color-background"
      d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
      </path>
      </g>
      </g>
      </g>
      </g>
      </svg>
      </div>
      <span class="nav-link-text ms-1">Grupos</span>
      </a>
    </li>
    -->
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('pruebas.index') ? 'active' : '' }}" href="{{ route('pruebas.index') }}">
      <div
        class="icon icon-shape icon-sm shadow border-radius-md {{ request()->routeIs('pruebas.index') ? 'bg-primary text-white' : 'bg-white text-dark' }} text-center me-2 d-flex align-items-center justify-content-center">
        <!-- Nuevo icono -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag-fill"
        viewBox="0 0 16 16">
        <path
          d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001" />
        </svg>
      </div>
      <span class="nav-link-text ms-1">Reporte de Respuestas</span>
      </a>
    </li>

    <li class="nav-item"></li>

    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Cuenta</h6>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ (Request::is('laravel-examples/user-profile') ? 'active' : '') }}"
      href="{{ url('laravel-examples/user-profile') }}">
      <div
        class="icon icon-shape icon-sm shadow border-radius-md {{ Request::is('laravel-examples/user-profile') ? 'bg-primary text-white' : 'bg-white text-dark' }} text-center me-2 d-flex align-items-center justify-content-center">
        <!-- Nuevo icono -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-person-lines-fill" viewBox="0 0 16 16">
        <path
          d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z" />
        </svg>
      </div>
      <span class="nav-link-text ms-1">Perfil</span>
      </a>
    </li>

    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Mayor información</h6>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ (Request::is('ayuda') ? 'active' : '') }}" href="{{ url('ayuda') }}">
      <div
        class="icon icon-shape icon-sm shadow border-radius-md {{ Request::is('ayuda') ? 'bg-primary text-white' : 'bg-white text-dark' }} text-center me-2 d-flex align-items-center justify-content-center">
        <!-- Nuevo icono -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-question-octagon-fill" viewBox="0 0 16 16">
        <path
          d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353zM5.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927" />
        </svg>
      </div>
      <span class="nav-link-text ms-1">Ayuda</span>
      </a>
    </li>

    <!-- Agrega más opciones para 'admin' aquí -->
  @endif
  </ul>
</aside>