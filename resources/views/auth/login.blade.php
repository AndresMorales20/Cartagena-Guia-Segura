@extends('layouts.app')

@section('title', Session::get('locale') == 'en' ? 'Login | Cartagena Guía Segura' : 'Iniciar Sesión | Cartagena Guía Segura')

@section('content')
<div class="login-body d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="login-card card p-4 shadow" style="max-width: 400px; width: 100%;">

        <!-- Logo y nombre -->
        <div class="text-center mb-3 d-flex flex-column align-items-center">
            <img src="{{ asset('images/hat.png') }}" 
                 alt="Sombrero Vueltiao" class="login-logo" style="height: 80px; width: 80px; object-fit: contain;">
            <h3 class="text-cartagena-terracota mt-2 fw-bold">Cartagena Guía Segura</h3>
        </div>

        <!-- Título -->
        <h2 class="text-center text-cartagena-terracota mb-2 fw-bold">
            @if(Session::get('locale') == 'en') Welcome Back @else Bienvenido Nuevamente @endif
        </h2>
        <p class="text-center mb-4 text-muted">
            @if(Session::get('locale') == 'en') Please log in to continue @else Por favor inicia sesión para continuar @endif
        </p>

        <!-- Formulario -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">
                    @if(Session::get('locale') == 'en') Email Address @else Correo Electrónico @endif
                </label>
                <input type="email" id="email" name="email" class="form-input form-control" required value="{{ old('email') }}">
                @error('email')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">
                    @if(Session::get('locale') == 'en') Password @else Contraseña @endif
                </label>
                <input type="password" id="password" name="password" class="form-input form-control" required>
                @error('password')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">
                    @if(Session::get('locale') == 'en') Remember Me @else Recuérdame @endif
                </label>
            </div>

            <!-- Botón Login -->
            <button type="submit" class="btn btn-teal w-100 mb-3">
                @if(Session::get('locale') == 'en') Login @else Iniciar Sesión @endif
            </button>

            <!-- Forgot Password -->
            <div class="text-center mb-3">
                <small class="text-muted">
                    @if(Session::get('locale') == 'en') Forgot your password? @else ¿Olvidaste tu contraseña? @endif
                    <a href="{{ route('password.request') }}" class="text-cartagena-terracota fw-bold">
    @if(Session::get('locale') == 'en') Recover it here @else Recupérala aquí @endif
</a>

                </small>
            </div>

            <!-- Enlace a registro -->
            <div class="text-center mt-2">
                <small>
                    @if(Session::get('locale') == 'en') Don't have an account? @else ¿No tienes cuenta? @endif
                    <a href="{{ route('register') }}" class="text-cartagena-terracota fw-bold">
                        @if(Session::get('locale') == 'en') Create one here @else Crea una aquí @endif
                    </a>
                </small>
            </div>

        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Modo oscuro persistente
    const themeSwitch = document.getElementById('theme-switch');
    if(themeSwitch){
        const currentTheme = localStorage.getItem('theme');
        if(currentTheme === 'dark') document.body.classList.add('dark-mode');
        themeSwitch.checked = currentTheme === 'dark';
        themeSwitch.addEventListener('change', () => {
            document.body.classList.toggle('dark-mode', themeSwitch.checked);
            localStorage.setItem('theme', themeSwitch.checked ? 'dark' : 'light');
        });
    }
});
</script>
@endsection
