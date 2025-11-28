@extends('layouts.app')

@section('title', Session::get('locale') == 'en' ? 'Login | Cartagena App' : 'Iniciar Sesión | Cartagena App')

@section('content')

<div class="container py-5 d-flex justify-content-center">

    <div class="card shadow-lg p-4" style="max-width: 450px; width:100%;">

        <!-- TÍTULO -->
        <h2 class="fw-bold text-cartagena-terracota text-center mb-3">
            @if(Session::get('locale') == 'en') 
                Welcome Back
            @else 
                Bienvenido Nuevamente
            @endif
        </h2>

        <p class="text-center text-muted mb-4">
            @if(Session::get('locale') == 'en') 
                Please log in to continue
            @else 
                Por favor inicia sesión para continuar
            @endif
        </p>

        <!-- FORMULARIO -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="form-label fw-bold">
                    @if(Session::get('locale') == 'en') 
                        Email Address
                    @else 
                        Correo Electrónico
                    @endif
                </label>

                <input type="email" name="email" class="form-control" required autofocus>

                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="mb-3">
                <label class="form-label fw-bold">
                    @if(Session::get('locale') == 'en') 
                        Password
                    @else 
                        Contraseña
                    @endif
                </label>

                <input type="password" name="password" class="form-control" required>

                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- REMEMBER ME -->
            <div class="form-check mb-4">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">

                <label for="remember" class="form-check-label">
                    @if(Session::get('locale') == 'en') 
                        Remember Me
                    @else 
                        Recuérdame
                    @endif
                </label>
            </div>

            <!-- BOTÓN -->
            <button type="submit" class="btn btn-teal w-100 py-2 fw-bold">
                @if(Session::get('locale') == 'en') 
                    Login
                @else 
                    Iniciar Sesión
                @endif
            </button>

        </form>

        <!-- PREGUNTA FINAL -->
        <p class="text-center mt-3">
            @if(Session::get('locale') == 'en') 
                Forgot your password?
            @else 
                ¿Olvidaste tu contraseña?
            @endif
            <a href="#" class="text-cartagena-terracota fw-bold" style="text-decoration: none;">
                @if(Session::get('locale') == 'en') 
                    Recover it here
                @else 
                    Recupérala aquí
                @endif
            </a>
        </p>

    </div>
</div>

@endsection
