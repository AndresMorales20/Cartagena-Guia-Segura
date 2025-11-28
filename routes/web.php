<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| RUTA PRINCIPAL (HOME)
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'home'])->name('home');

/*
|--------------------------------------------------------------------------
| PÁGINAS ESTÁTICAS
|--------------------------------------------------------------------------
*/
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/support', [PageController::class, 'support'])->name('support');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/settings', [PageController::class, 'settings'])->name('settings');

/*
|--------------------------------------------------------------------------
| CAMBIO DE IDIOMA
|--------------------------------------------------------------------------
*/
Route::get('/locale/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'es'])) {
        $locale = 'en';
    }
    Session::put('locale', $locale);
    return redirect()->back();
});

/*
|--------------------------------------------------------------------------
| LOGIN / REGISTER / PASSWORD
|--------------------------------------------------------------------------
*/
// LOGIN / LOGOUT
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// REGISTRO
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// RECUPERACIÓN DE CONTRASEÑA SIMULADA
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// RESET DE CONTRASEÑA REAL
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

/*
|--------------------------------------------------------------------------
| PROFILE / ACCOUNT ROUTES (auth required)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function() {
    Route::post('/profile/email', [ProfileController::class, 'updateEmail'])->name('profile.update.email');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
});

/*
|--------------------------------------------------------------------------
| SIMULACIÓN DE ENVÍO DE MENSAJE DE SOPORTE
|--------------------------------------------------------------------------
*/
Route::post('/support/send', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    return back()->with('success', 
        Session::get('locale') == 'en' 
            ? 'Your message has been sent successfully!' 
            : '¡Tu mensaje ha sido enviado con éxito!'
    );
});
