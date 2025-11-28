@extends('layouts.app')

@section('title', Session::get('locale') == 'en' ? 'Settings | Cartagena App' : 'Configuración | Cartagena App')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-cartagena-terracota mb-4">
        @if(Session::get('locale') == 'en') Settings @else Configuración @endif
    </h2>
    <div class="card p-4 shadow-sm">

        <!-- Mensajes de éxito o error -->
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Usuario activo -->
        @if(Auth::check())
        <h4 class="fw-bold text-cartagena-blue mb-3">
            @if(Session::get('locale') == 'en') Logged in as: @else Conectado como: @endif 
            <span class="text-cartagena-terracota">{{ Auth::user()->name }}</span>
        </h4>
        @endif

        <!-- Idioma -->
        <h4 class="fw-bold text-cartagena-blue mb-3">
            @if(Session::get('locale') == 'en') Language @else Idioma @endif
        </h4>
        <div class="d-flex gap-3 mb-4">
            <a href="{{ url('locale/en') }}" class="btn {{ Session::get('locale') == 'en' ? 'btn-cartagena-terracota' : 'btn-outline-cartagena-terracota' }}">English</a>
            <a href="{{ url('locale/es') }}" class="btn {{ Session::get('locale') == 'es' ? 'btn-cartagena-terracota' : 'btn-outline-cartagena-terracota' }}">Español</a>
        </div>

        <!-- Tema -->
        <h4 class="fw-bold text-cartagena-blue mb-3">
            @if(Session::get('locale') == 'en') Appearance @else Apariencia @endif
        </h4>
        <div class="form-check form-switch mb-3 d-flex align-items-center gap-2">
            <input class="form-check-input" type="checkbox" id="theme-switch">
            <label class="form-check-label mb-0" for="theme-switch">
                @if(Session::get('locale') == 'en') Dark Mode @else Modo Oscuro @endif
            </label>
            <i class="bi bi-question-circle" data-bs-toggle="tooltip" title="@if(Session::get('locale') == 'en') Elegant dark theme for all pages @else Tema oscuro elegante para todas las páginas @endif"></i>
        </div>

        <!-- Notificaciones -->
        <h4 class="fw-bold text-cartagena-blue mb-3">
            @if(Session::get('locale') == 'en') Notifications @else Notificaciones @endif
        </h4>
        <div class="form-check form-switch mb-3 d-flex align-items-center gap-2">
            <input class="form-check-input" type="checkbox" id="notif-switch" checked>
            <label class="form-check-label mb-0" for="notif-switch">
                @if(Session::get('locale') == 'en') Receive updates & recommendations @else Recibir actualizaciones y recomendaciones @endif
            </label>
            <i class="bi bi-question-circle" data-bs-toggle="tooltip" title="@if(Session::get('locale') == 'en') Toggle notifications @else Activar o desactivar notificaciones @endif"></i>
        </div>

        <!-- Accesibilidad -->
        <h4 class="fw-bold text-cartagena-blue mb-3">
            @if(Session::get('locale') == 'en') Accessibility @else Accesibilidad @endif
        </h4>
        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="big-text">
            <label class="form-check-label mb-0" for="big-text">
                @if(Session::get('locale') == 'en') Enable large text @else Activar texto grande @endif
            </label>
        </div>
        <div class="form-check d-flex align-items-center gap-2 mb-2">
            <input class="form-check-input" type="checkbox" id="high-contrast">
            <label class="form-check-label mb-0" for="high-contrast">
                @if(Session::get('locale') == 'en') High contrast mode @else Modo de alto contraste @endif
            </label>
            <i class="bi bi-question-circle" data-bs-toggle="tooltip" title="@if(Session::get('locale') == 'en') Improves contrast for accessibility @else Mejora contraste para accesibilidad @endif"></i>
        </div>

        <!-- Ajustes de cuenta solo si hay sesión -->
        @if(Auth::check())
        <h4 class="fw-bold text-cartagena-blue mb-3">@if(Session::get('locale') == 'en') Account @else Cuenta @endif</h4>
        <div class="d-flex flex-column gap-3">
            <!-- Formulario cambiar correo -->
            <form method="POST" action="{{ route('profile.update.email') }}">
                @csrf
                <input type="email" name="email" class="form-control mb-2" placeholder="@if(Session::get('locale') == 'en') New Email @else Nuevo Correo @endif" required>
                <button type="submit" class="btn btn-outline-cartagena-terracota">
                    @if(Session::get('locale') == 'en') Change Email @else Cambiar Correo @endif
                </button>
            </form>

            <!-- Formulario cambiar contraseña -->
            <form method="POST" action="{{ route('profile.update.password') }}">
                @csrf
                <input type="password" name="current_password" class="form-control mb-2" placeholder="@if(Session::get('locale') == 'en') Current Password @else Contraseña Actual @endif" required>
                <input type="password" name="password" class="form-control mb-2" placeholder="@if(Session::get('locale') == 'en') New Password @else Nueva Contraseña @endif" required>
                <input type="password" name="password_confirmation" class="form-control mb-2" placeholder="@if(Session::get('locale') == 'en') Confirm Password @else Confirmar Contraseña @endif" required>
                <button type="submit" class="btn btn-outline-cartagena-terracota">
                    @if(Session::get('locale') == 'en') Change Password @else Cambiar Contraseña @endif
                </button>
            </form>

            <!-- Botón cerrar sesión -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">
                    @if(Session::get('locale') == 'en') Logout @else Cerrar Sesión @endif
                </button>
            </form>
        </div>
        @endif

    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tooltips de Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (el) {
        return new bootstrap.Tooltip(el);
    });

    // Modo oscuro persistente
    const themeSwitch = document.getElementById('theme-switch');
    const currentTheme = localStorage.getItem('theme');
    if(currentTheme === 'dark') {
        document.body.classList.add('dark-mode');
        themeSwitch.checked = true;
    }
    themeSwitch.addEventListener('change', () => {
        document.body.classList.toggle('dark-mode', themeSwitch.checked);
        localStorage.setItem('theme', themeSwitch.checked ? 'dark' : 'light');
    });

    // Accesibilidad
    const bigTextCheckbox = document.getElementById('big-text');
    bigTextCheckbox.addEventListener('change', () => document.body.classList.toggle('big-text', bigTextCheckbox.checked));

    const contrastCheckbox = document.getElementById('high-contrast');
    contrastCheckbox.addEventListener('change', () => document.body.classList.toggle('high-contrast', contrastCheckbox.checked));
});
</script>
@endsection
