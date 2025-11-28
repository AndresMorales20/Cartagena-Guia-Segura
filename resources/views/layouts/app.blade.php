<!DOCTYPE html>
<html lang="{{ Session::get('locale') ?? 'es' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Cartagena Guides')</title>

    {{-- BOOTSTRAP 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- BOOTSTRAP ICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- CUSTOM CSS --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="{{ session('darkMode') == 'enabled' ? 'dark-mode' : '' }}">

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
            <img src="{{ asset('images/hat.png') }}" alt="Sombrero Vueltiao" style="height:40px; width:40px; object-fit:contain; margin-right:10px;">
            <span>Cartagena Guía Segura</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">@if(Session::get('locale') == 'en') About @else Acerca @endif</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/faq') }}">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/support') }}">@if(Session::get('locale') == 'en') Support @else Soporte @endif</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/terms') }}">@if(Session::get('locale') == 'en') Terms @else Términos @endif</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/settings') }}">@if(Session::get('locale') == 'en') Settings @else Configuración @endif</a></li>

                {{-- LOGIN / LOGOUT --}}
                @if(!Auth::check())
                    <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('login') }}">@if(Session::get('locale') == 'en') Login @else Iniciar Sesión @endif</a></li>
                @else
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">@if(Session::get('locale') == 'en') Logout @else Cerrar Sesión @endif</button>
                        </form>
                    </li>
                @endif

                {{-- Botón cambio idioma --}}
                <li class="nav-item ms-3">
                    @if(Session::get('locale') == 'en')
                        <a href="{{ url('locale/es') }}" class="btn btn-outline-dark btn-sm">ES</a>
                    @else
                        <a href="{{ url('locale/en') }}" class="btn btn-outline-dark btn-sm">EN</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- CONTENIDO --}}
<div class="container-fluid py-4">
    @yield('content')
</div>

{{-- FOOTER --}}
<footer class="text-center py-4 mt-5">
    <p class="text-muted small mb-0">© {{ date('Y') }} Cartagena Guía Segura — All rights reserved.</p>
</footer>

{{-- BOOTSTRAP JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

{{-- Dark Mode y accesibilidad --}}
<script>
    if(localStorage.getItem('darkMode') === 'enabled'){
        document.body.classList.add('dark-mode');
    }

    const themeSwitch = document.getElementById('theme-switch');
    if(themeSwitch){
        themeSwitch.checked = localStorage.getItem('darkMode') === 'enabled';
        themeSwitch.addEventListener('change', function(){
            document.body.classList.toggle('dark-mode');
            if(this.checked){
                localStorage.setItem('darkMode', 'enabled');
            } else {
                localStorage.setItem('darkMode', 'disabled');
            }
        });
    }

    const bigTextSwitch = document.getElementById('big-text');
    if(bigTextSwitch){
        bigTextSwitch.addEventListener('change', function() {
            document.body.classList.toggle('big-text');
        });
    }
    const highContrastSwitch = document.getElementById('high-contrast');
    if(highContrastSwitch){
        highContrastSwitch.addEventListener('change', function() {
            document.body.classList.toggle('high-contrast');
        });
    }

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    [...tooltipTriggerList].map(t => new bootstrap.Tooltip(t));
</script>

@yield('scripts')
</body>
</html>
