<!-- Navbar -->
<!-- Bootstrap 5 CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>

<nav class="navbar navbar-expand-lg shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid">
        <div class="d-flex justify-content-between w-100">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1">
                    <li class="breadcrumb-item"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-dark active text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</li>
                </ol>
                <h6 class="font-weight-bolder text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
            </nav>

            <div class="d-flex align-items-center justify-content-center flex-grow-1">
                <input type="text" class="form-control" placeholder="Type here..." style="width: 100%; max-width: 500px;">
            </div>

            <ul class="navbar-nav d-flex align-items-center ms-auto mb-2 mb-lg-0">
                <!-- Botón de Jugar con ícono de play -->
                <li class="nav-item me-3">
                    <a class="nav-link dropdown-toggle d-flex align-items-center text-white" 
                       href="#" 
                       id="jugarDropdown" 
                       role="button" 
                       data-bs-toggle="dropdown"
                       style="background: linear-gradient(310deg, #1d47c1, #a848d0); padding: 8px 16px; border-radius: 6px;">
                        <i class="fa fa-play me-2"></i> Jugar
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;">
                        <li>
                            <form action="{{ route('tuRuta') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="gameUrl" class="form-label">URL del juego:</label>
                                    <input type="url" 
                                           class="form-control" 
                                           id="gameUrl" 
                                           name="gameUrl" 
                                           placeholder="Ingrese URL del juego" 
                                           required>
                                    @error('gameUrl')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" 
                                        class="btn btn-primary w-100"
                                        style="background: linear-gradient(310deg, #1d47c1, #a848d0); border: none;">
                                    Jugar
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>

                <!-- Menú de Perfil -->
                <li class="nav-item me-3">
                    <a class="nav-link dropdown-toggle d-flex align-items-center text-body" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fa fa-user me-1"></i> Perfil
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('user-profile') }}">Configuración del perfil</a></li>
                        <li><a class="dropdown-item" href="{{ url('/logout') }}">Cerrar sesión</a></li>
                    </ul>
                </li>

                <!-- Notificaciones -->
                <li class="nav-item me-3">
                    <a href="javascript:;" class="nav-link text-body d-flex align-items-center">
                        <i class="fa fa-bell"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>