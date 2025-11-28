@extends('layouts.app')

@section('title', Session::get('locale') == 'en' ? 'Register | Cartagena App' : 'Registro | Cartagena App')

@section('content')
<div class="login-body d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="login-card card p-4 shadow" style="max-width: 400px; width: 100%;">

        <!-- Logo SIN cuadro blanco -->
        <div class="text-center mb-3 d-flex flex-column align-items-center">
            <img src="{{ asset('images/hat.png') }}"
                 alt="Sombrero Vueltiao"
                 class="login-logo"
                 style="height: 80px; width: 80px; object-fit: contain;">
        </div>

        <!-- Título -->
        <h2 class="text-center text-cartagena-terracota mb-4 fw-bold">
            @if(Session::get('locale') == 'en') 
                Create your account 
            @else 
                Crea tu cuenta 
            @endif
        </h2>

        <!-- Formulario -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">
                    @if(Session::get('locale') == 'en') Name @else Nombre @endif
                </label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">
                    @if(Session::get('locale') == 'en') Email Address @else Correo Electrónico @endif
                </label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">
                    @if(Session::get('locale') == 'en') Password @else Contraseña @endif
                </label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    @if(Session::get('locale') == 'en') Confirm Password @else Confirmar Contraseña @endif
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-teal w-100">
                @if(Session::get('locale') == 'en') Create Account @else Crear cuenta @endif
            </button>
        </form>

        <div class="text-center mt-3">
            <small>
                @if(Session::get('locale') == 'en') Already have an account? @else ¿Ya tienes cuenta? @endif
                <a href="{{ route('login') }}" class="text-cartagena-terracota">
                    @if(Session::get('locale') == 'en') Login here @else Inicia sesión @endif
                </a>
            </small>
        </div>
    </div>
</div>
@endsection
