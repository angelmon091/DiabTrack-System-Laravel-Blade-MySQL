<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DiabTrack - Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboardc.css') }}">
    @yield('styles')
</head>
<body>

    <header class="navbar">
        <div class="navbar-content">
            <a href="{{ route('dashboard') }}" class="logo-small" ><h2 class="logo-small">D<span>ia</span>bTrack</h2></a>
            
            <div class="nav-search d-none d-lg-block">
                <input type="text" class="form-control" placeholder="Buscar...">
            </div>

            <nav class="nav-menu">
                <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Inicio</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-chart-column"></i>
                    <span>Resumen</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-plus"></i>
                    <span>Nuevo</span>
                </a>
            </nav>

            <div class="user-section">
                <a href="#" class="nav-item me-3">
                    <i class="fa-solid fa-bell notification"></i>
                </a>
                <div class="user-card">
                    <div class="user-text d-none d-sm-block">
                        <span class="user-name">{{ auth()->user()->name }}</span>
                        <span class="user-email">{{ auth()->user()->email }}</span>
                    </div>
                    <div class="user-avatar">
                        <img src="{{ asset('img/medios/etc/yo.jpg') }}" alt="yo">
                    </div>
                    <!-- Formulario de Logout (Opcional pero recomendado) -->
                    <form method="POST" action="{{ route('logout') }}" class="ms-2">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 text-white" title="Cerrar Sesión">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="site-footer">
        <div class="footer-content">
            <div class="links">
                <a href="#">Políticas de Privacidad</a>
                <a href="#">Términos y Condiciones</a>
                <a href="#">Desarrolladores</a>
            </div>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-apple"></i>
                <a href="#"><i class="fa-brands fa-reddit"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
