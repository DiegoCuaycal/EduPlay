<!-- Navbar -->
<!-- Bootstrap 5 CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>

<nav class="navbar navbar-expand-lg shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1">
                <li class="breadcrumb-item"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-dark active text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
            <h6 class="font-weight-bolder text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
        </nav>

        <div class="d-flex align-items-center">
            <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Type here...">
            </div>
            <ul class="navbar-nav ms-3">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-body" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fa fa-user me-1"></i> Perfil
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ url('/profile-settings') }}">Configuración del perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ url('/logout') }}">Cerrar sesión</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link text-body" id="dropdownMenuButton" data-bs-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="javascript:;">New message from Laur</a></li>
                        <li><a class="dropdown-item" href="javascript:;">New album by Travis Scott</a></li>
                        <li><a class="dropdown-item" href="javascript:;">Payment successfully completed</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- End Navbar -->