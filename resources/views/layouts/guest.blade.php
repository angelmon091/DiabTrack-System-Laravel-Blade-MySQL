<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DiabTrack') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-global.css') }}">
    @stack('styles')
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{ $slot }}

    <footer class="site-footer">
        <div class="footer-content">
            <div class="links">
                <a href="#">{{ __('Políticas de Privacidad') }}</a>
                <a href="#">{{ __('Términos y Condiciones') }}</a>
                <a href="#">{{ __('Desarrolladores') }}</a>
            </div>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-apple"></i>
                <i class="fa-brands fa-reddit"></i>
            </div>
        </div>
    </footer>
</body>
</html>
