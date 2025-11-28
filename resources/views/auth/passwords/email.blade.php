@extends('layouts.app')

@section('title', Session::get('locale') == 'en' ? 'Recover Password | Cartagena Guía Segura' : 'Recuperar Contraseña | Cartagena Guía Segura')

@section('content')
<div class="login-body d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="login-card card p-4 shadow" style="max-width: 400px; width: 100%;">

        <!-- Logo y nombre (igual que login y reset) -->
        <div class="text-center mb-3 d-flex flex-column align-items-center">
            <img src="{{ asset('images/hat.png') }}" 
                 alt="Sombrero Vueltiao" 
                 class="login-logo"
                 style="height: 80px; width: 80px; object-fit: contain;">
            
            <h3 class="text-cartagena-terracota mt-2 fw-bold">
                Cartagena Guía Segura
            </h3>
        </div>

        <!-- Título -->
        <h2 class="text-center text-cartagena-terracota mb-2 fw-bold">
            @if(Session::get('locale') == 'en') 
                Recover Password 
            @else 
                Recuperar Contraseña 
            @endif
        </h2>

        <p class="text-center mb-4 text-muted">
            @if(Session::get('locale') == 'en') 
                Enter your email to receive a password reset link. 
            @else 
                Ingresa tu correo electrónico para recibir un enlace de restablecimiento. 
            @endif
        </p>

        <!-- Mensaje de éxito -->
        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif

        <!-- Formulario -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">
                    @if(Session::get('locale') == 'en') 
                        Email Address 
                    @else 
                        Correo Electrónico 
                    @endif
                </label>

                <input type="email" id="email" name="email" class="form-control" required value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botón -->
            <button type="submit" class="btn btn-teal w-100 mb-3">
                @if(Session::get('locale') == 'en') 
                    Send Reset Link 
                @else 
                    Enviar enlace 
                @endif
            </button>

            <!-- Enlace a login -->
            <div class="text-center mt-2">
                <small>
                    @if(Session::get('locale') == 'en') 
                        Remembered your password? 
                    @else 
                        ¿Recordaste tu contraseña? 
                    @endif

                    <a href="{{ route('login') }}" class="text-cartagena-terracota fw-bold">
                        @if(Session::get('locale') == 'en') Log in here @else Inicia sesión aquí @endif
                    </a>
                </small>
            </div>

        </form>
    </div>
</div>
@endsection
