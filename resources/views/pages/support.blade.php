@extends('layouts.app')

@section('title', Session::get('locale') == 'en' ? 'Support' : 'Soporte')

@section('content')
<div class="container py-5">

    {{-- TÍTULO --}}
    <h2 class="fw-bold text-cartagena-terracota mb-3">
        @if(Session::get('locale') == 'en')
            Support Center
        @else
            Centro de Soporte
        @endif
    </h2>

    <p class="text-muted mb-4">
        @if(Session::get('locale') == 'en')
            If you need help, contact us using the form below.
        @else
            Si necesitas ayuda, contáctanos usando el formulario a continuación.
        @endif
    </p>

    {{-- FORMULARIO DE CONTACTO --}}
    <div class="card shadow-sm mb-5">
        <div class="card-body">

            {{-- Mensaje de éxito --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ url('/support/send') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        @if(Session::get('locale') == 'en') Your Name @else Tu Nombre @endif
                    </label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Email
                    </label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        @if(Session::get('locale') == 'en') Message @else Mensaje @endif
                    </label>
                    <textarea name="message" class="form-control" rows="4" required>{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn btn-teal w-100 fw-bold">
                    @if(Session::get('locale') == 'en') Send Message @else Enviar Mensaje @endif
                </button>
            </form>

        </div>
    </div>

    {{-- AYUDA RÁPIDA: FAQ INTERACTIVO --}}
    <h3 class="fw-bold text-cartagena-terracota mb-3">
        @if(Session::get('locale') == 'en')
            Quick Help
        @else
            Ayuda Rápida
        @endif
    </h3>

    <div class="accordion" id="quickHelpAccordion">

        {{-- Pregunta 1 --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="q1">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a1">
                    @if(Session::get('locale') == 'en')
                        How do I reset my password?
                    @else
                        ¿Cómo restablezco mi contraseña?
                    @endif
                </button>
            </h2>
            <div id="a1" class="accordion-collapse collapse" data-bs-parent="#quickHelpAccordion">
                <div class="accordion-body">
                    @if(Session::get('locale') == 'en')
                        Go to the login page and click on “Forgot password?”. We will send a recovery link to your email.
                    @else
                        Ve a la página de inicio de sesión y haz clic en “¿Olvidaste tu contraseña?”. Te enviaremos un enlace de recuperación al correo.
                    @endif
                </div>
            </div>
        </div>

        {{-- Pregunta 2 --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="q2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a2">
                    @if(Session::get('locale') == 'en')
                        Why can’t I open the map for some experiences?
                    @else
                        ¿Por qué no puedo abrir el mapa para algunas experiencias?
                    @endif
                </button>
            </h2>
            <div id="a2" class="accordion-collapse collapse" data-bs-parent="#quickHelpAccordion">
                <div class="accordion-body">
                    @if(Session::get('locale') == 'en')
                        Some guides do not yet have an exact location available. We are updating them progressively.
                    @else
                        Algunas experiencias aún no tienen una ubicación exacta disponible. Estamos actualizándolas progresivamente.
                    @endif
                </div>
            </div>
        </div>

        {{-- Pregunta 3 --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="q3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a3">
                    @if(Session::get('locale') == 'en')
                        I think some information is incorrect. How can I report it?
                    @else
                        Creo que alguna información es incorrecta. ¿Cómo la reporto?
                    @endif
                </button>
            </h2>
            <div id="a3" class="accordion-collapse collapse" data-bs-parent="#quickHelpAccordion">
                <div class="accordion-body">
                    @if(Session::get('locale') == 'en')
                        Use the contact form above. Select the category “Incorrect information” so we can update it quickly.
                    @else
                        Usa el formulario de contacto de arriba. Selecciona la categoría “Información incorrecta” para que podamos corregirlo rápidamente.
                    @endif
                </div>
            </div>
        </div>

        {{-- Pregunta 4 --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="q4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a4">
                    @if(Session::get('locale') == 'en')
                        Are the experiences free or paid?
                    @else
                        ¿Las experiencias son gratis o pagas?
                    @endif
                </button>
            </h2>
            <div id="a4" class="accordion-collapse collapse" data-bs-parent="#quickHelpAccordion">
                <div class="accordion-body">
                    @if(Session::get('locale') == 'en')
                        Most experiences have a cost. Prices vary depending on the guide and activity.
                    @else
                        La mayoría de experiencias tienen un costo. Los precios varían según el guía y la actividad.
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
