<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    /**
     * Mostrar el formulario de recuperación de contraseña.
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email'); // Tu Blade actual
    }

    /**
     * Simular el envío del enlace de recuperación.
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Mensaje simulado
        $statusMessage = Session::get('locale') === 'en'
            ? 'Recovery link sent successfully!'
            : '¡Enlace de recuperación enviado con éxito!';

        // Retorna al formulario con mensaje
        return back()->with('status', $statusMessage);
    }
}

