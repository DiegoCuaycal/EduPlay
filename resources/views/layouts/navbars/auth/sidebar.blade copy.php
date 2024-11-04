<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
  id="sidenav-main" style="width: 250px; background-color: #e9ecef">
  <div class="sidenav-header">
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
      <img src="../assets/img/Fecyt/Fecyt.png" class="navbar-brand-img h-100" alt="..."
        style="width: 400px; height: 400; max-height: 250px;">
    </a>
  </div>

  <hr class="horizontal dark mt-0">

  <ul class="navbar-nav">
    <!-- Opciones para el rol 'usuario' -->
    @if (Auth::check() && Auth::user()->hasRole('usuario'))
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="12px" height="100%" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>Inicio</title>
              <!-- Icono SVG aquí -->
            </svg>
          </div>
          <span class="nav-link-text ms-1">Inicio</span>
        </a>
      </li>
      <!-- Agrega más opciones aquí para usuarios -->
    @endif

    <!-- Opciones para el rol 'admin' -->
    @if (Auth::check() && Auth::user()->hasRole('admin'))
      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laravel Examples</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}" href="{{ url('dashboard') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="12px" height="100%" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>shop</title>
              <!-- Icono SVG aquí -->
            </svg>
          </div>
          <span class="nav-link-text ms-1">Dashboard Admin</span>
        </a>
      </li>
      <!-- Agrega más opciones aquí para administradores -->
    @endif
  </ul>
</aside>
