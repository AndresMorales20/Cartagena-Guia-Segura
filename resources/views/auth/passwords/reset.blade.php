@extends('layouts.app')

@section('title', Session::get('locale') == 'en' ? 'Reset Password' : 'Restablecer Contraseña')

@section('content')
<div class="login-body d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="login-card card p-4 shadow" style="max-width: 400px; width: 100%;">

        <!-- Logo y nombre (igual que en login) -->
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
        <h2 class="text-center text-cartagena-terracota mb-4 fw-bold">
            @if(Session::get('locale') == 'en') 
                Reset Password 
            @else 
                Restablecer Contraseña 
            @endif
        </h2>

        <!-- Formulario -->
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">
                    @if(Session::get('locale') == 'en') 
                        Email Address 
                    @else 
                        Correo Electrónico 
                    @endif
                </label>

                <input type="email" 
                       class="form-control" 
                       name="email" 
                       id="email" 
                       value="{{ $email ?? old('email') }}" 
                       required>

                @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <!-- New Password -->
            <div class="mb-3">
                <label for="password" class="form-label">
                    @if(Session::get('locale') == 'en') 
                        New Password 
                    @else 
                        Nueva Contraseña 
                    @endif
                </label>

                <input type="password" class="form-control" name="password" id="password" required>

                @error('password')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    @if(Session::get('locale') == 'en') 
                        Confirm Password 
                    @else 
                        Confirmar Contraseña 
                    @endif
                </label>

                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
            </div>

            <!-- Botón -->
            <button type="submit" class="btn btn-teal w-100">
                @if(Session::get('locale') == 'en') 
                    Reset Password 
                @else 
                    Restablecer Contraseña 
                @endif
            </button>
        </form>
    </div>
</div>
@endsection
