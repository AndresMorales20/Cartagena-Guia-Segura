@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="container mx-auto max-w-md mt-10">
    <h2 class="text-center text-2xl mb-4">@if(Session::get('locale') == 'en') Reset Password @else Restablecer Contraseña @endif</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-4">
            <label class="block mb-1">@if(Session::get('locale') == 'en') Email @else Correo electrónico @endif</label>
            <input type="email" name="email" value="{{ $email ?? old('email') }}" class="w-full border p-2 rounded" required autofocus>
            @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">@if(Session::get('locale') == 'en') Password @else Contraseña @endif</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
            @error('password')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">@if(Session::get('locale') == 'en') Confirm Password @else Confirmar Contraseña @endif</label>
            <input type="password" name="password_confirmation" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="w-full bg-cartagena-terracota text-white p-2 rounded">
            @if(Session::get('locale') == 'en') Reset Password @else Restablecer Contraseña @endif
        </button>
    </form>
</div>
@endsection
