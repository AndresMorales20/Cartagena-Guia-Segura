@extends('layouts.app')

@section('title', Session::get('locale') == 'en' ? 'FAQ | Cartagena App' : 'Preguntas Frecuentes | Cartagena App')

@section('content')

<div class="container py-5">

    <!-- TÍTULO -->
    <h2 class="fw-bold text-cartagena-terracota mb-4">
        @if(Session::get('locale') == 'en')
            Frequently Asked Questions
        @else
            Preguntas Frecuentes
        @endif
    </h2>

    <!-- DESCRIPCIÓN -->
    <p class="text-muted mb-5">
        @if(Session::get('locale') == 'en')
            Here you can find answers to the most common questions from our users.
            If you need further support, feel free to visit our Support Center.
        @else
            Aquí encontrarás respuestas a las preguntas más comunes de nuestros usuarios.
            Si necesitas más ayuda, visita nuestro Centro de Soporte.
        @endif
    </p>


    <!-- ACORDEÓN -->
    <div class="accordion" id="faqAccordion">

        <!-- FAQ 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse1">
                    @if(Session::get('locale') == 'en')
                        How do I create an account?
                    @else
                        ¿Cómo creo una cuenta?
                    @endif
                </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    @if(Session::get('locale') == 'en')
                        You can create an account by clicking the "Login" option on the top menu and selecting
                        "Register". Fill in your basic information and confirm your email to activate your account.
                    @else
                        Puedes crear una cuenta haciendo clic en la opción "Login" en el menú superior y seleccionando
                        "Register". Completa tu información básica y confirma tu correo para activar tu cuenta.
                    @endif
                </div>
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse2">
                    @if(Session::get('locale') == 'en')
                        I forgot my password. What should I do?
                    @else
                        Olvidé mi contraseña. ¿Qué hago?
                    @endif
                </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    @if(Session::get('locale') == 'en')
                        Click "Login" and then select "Forgot my password". Follow the instructions to reset it
                        through your registered email.
                    @else
                        Haz clic en "Login" y luego selecciona "Olvidé mi contraseña". Sigue las instrucciones
                        para restablecerla a través de tu correo registrado.
                    @endif
                </div>
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse3">
                    @if(Session::get('locale') == 'en')
                        How can I change the language of the app?
                    @else
                        ¿Cómo puedo cambiar el idioma de la aplicación?
                    @endif
                </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    @if(Session::get('locale') == 'en')
                        Use the globe icon on the top right of the screen. You can switch between English and Spanish
                        instantly.
                    @else
                        Usa el ícono del globo en la parte superior derecha de la pantalla. Puedes cambiar entre inglés 
                        y español al instante.
                    @endif
                </div>
            </div>
        </div>

        <!-- FAQ 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse4">
                    @if(Session::get('locale') == 'en')
                        How do I report incorrect information about an experience?
                    @else
                        ¿Cómo reporto información incorrecta sobre una experiencia?
                    @endif
                </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    @if(Session::get('locale') == 'en')
                        Go to the Support section and submit a report with details about the incorrect information.
                        Our team will review it within 24–48 hours.
                    @else
                        Ve a la sección de Soporte y envía un reporte con los detalles de la información incorrecta.
                        Nuestro equipo la revisará en un plazo de 24 a 48 horas.
                    @endif
                </div>
            </div>
        </div>

        <!-- FAQ 5 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse5">
                    @if(Session::get('locale') == 'en')
                        How do I contact customer support?
                    @else
                        ¿Cómo contacto al servicio al cliente?
                    @endif
                </button>
            </h2>
            <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    @if(Session::get('locale') == 'en')
                        You can reach us through our Support page or directly via phone at 
                        <strong>(+57) 305 341 4574</strong>.
                    @else
                        Puedes comunicarte con nosotros desde la página de Soporte o directamente al teléfono 
                        <strong>(+57) 305 341 4574</strong>.
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
