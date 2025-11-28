@extends('layouts.app')

@section('title', Session::get('locale') == 'en' ? 'Terms & Conditions | Cartagena App' : 'Términos y Condiciones | Cartagena App')

@section('content')

<div class="container py-5">

    <!-- TÍTULO -->
    <h2 class="fw-bold text-cartagena-terracota mb-3">
        @if(Session::get('locale') == 'en')
            Terms & Conditions
        @else
            Términos y Condiciones
        @endif
    </h2>

    <!-- DESCRIPCIÓN -->
    <p class="text-muted mb-4">
        @if(Session::get('locale') == 'en')
            By using our website and services, you agree to the following terms and conditions.
            Please read them carefully.
        @else
            Al utilizar nuestro sitio web y servicios, aceptas los siguientes términos y condiciones.
            Por favor léelos atentamente.
        @endif
    </p>


    <!-- SECCIÓN 1: USO PERMITIDO -->
    <div class="mb-4">
        <h4 class="fw-bold text-cartagena-blue">
            @if(Session::get('locale') == 'en') 1. Acceptable Use @else 1. Uso Permitido @endif
        </h4>

        <p class="mt-2">
            @if(Session::get('locale') == 'en')
                You agree to use the platform only for lawful, personal, and non-commercial purposes.
                You will not misuse the information displayed nor attempt to interfere with the
                functionality or security of the website.
            @else
                Aceptas utilizar la plataforma únicamente para fines legales, personales y no comerciales.
                No puedes hacer un uso indebido de la información mostrada ni intentar interferir con
                la funcionalidad o seguridad del sitio web.
            @endif
        </p>
    </div>


    <!-- SECCIÓN 2: INFORMACIÓN Y EXACTITUD -->
    <div class="mb-4">
        <h4 class="fw-bold text-cartagena-blue">
            @if(Session::get('locale') == 'en') 2. Accuracy of Information @else 2. Exactitud de la Información @endif
        </h4>

        <p class="mt-2">
            @if(Session::get('locale') == 'en')
                Although we strive to keep the information updated and accurate, some details such as 
                opening hours, availability, or ratings may change without notice. We are not responsible 
                for external inaccuracies.
            @else
                Aunque nos esforzamos por mantener la información actualizada y precisa, algunos datos como 
                horarios, disponibilidad o calificaciones pueden cambiar sin previo aviso. No somos responsables 
                por inexactitudes externas.
            @endif
        </p>
    </div>


    <!-- SECCIÓN 3: PRIVACIDAD -->
    <div class="mb-4">
        <h4 class="fw-bold text-cartagena-blue">
            @if(Session::get('locale') == 'en') 3. Privacy & Data Use @else 3. Privacidad y Uso de Datos @endif
        </h4>

        <p class="mt-2">
            @if(Session::get('locale') == 'en')
                We collect basic technical information to improve your browsing experience.  
                We do not sell, rent, or share your personal data with third parties.
            @else
                Recopilamos información técnica básica para mejorar tu experiencia de navegación.  
                No vendemos, alquilamos ni compartimos tus datos personales con terceros.
            @endif
        </p>
    </div>


    <!-- SECCIÓN 4: CUENTAS Y ACCESO -->
    <div class="mb-4">
        <h4 class="fw-bold text-cartagena-blue">
            @if(Session::get('locale') == 'en') 4. Accounts & Access @else 4. Cuentas y Acceso @endif
        </h4>

        <p class="mt-2">
            @if(Session::get('locale') == 'en')
                You are responsible for maintaining the confidentiality of your login credentials
                and for all activities carried out under your account.
            @else
                Eres responsable de mantener la confidencialidad de tus credenciales de acceso 
                y de todas las actividades realizadas bajo tu cuenta.
            @endif
        </p>
    </div>


    <!-- SECCIÓN 5: LIMITACIÓN DE RESPONSABILIDAD -->
    <div class="mb-4">
        <h4 class="fw-bold text-cartagena-blue">
            @if(Session::get('locale') == 'en') 5. Limitation of Liability @else 5. Limitación de Responsabilidad @endif
        </h4>

        <p class="mt-2">
            @if(Session::get('locale') == 'en')
                We are not liable for damages caused by misuse of the website, external data errors,
                service interruptions, or third-party links outside our control.
            @else
                No somos responsables por daños ocasionados por el mal uso del sitio web, errores en datos externos,
                interrupciones del servicio o enlaces de terceros fuera de nuestro control.
            @endif
        </p>
    </div>


    <!-- SECCIÓN 6: PROPIEDAD INTELECTUAL -->
    <div class="mb-4">
        <h4 class="fw-bold text-cartagena-blue">
            @if(Session::get('locale') == 'en') 6. Intellectual Property @else 6. Propiedad Intelectual @endif
        </h4>

        <p class="mt-2">
            @if(Session::get('locale') == 'en')
                All images, logos, and written content on this website belong to their respective owners.
                Unauthorized use, reproduction, or distribution is prohibited.
            @else
                Todas las imágenes, logotipos y contenido escrito en este sitio pertenecen a sus respectivos dueños.
                Se prohíbe el uso, reproducción o distribución no autorizada.
            @endif
        </p>
    </div>


    <!-- SECCIÓN 7: CAMBIOS A LOS TÉRMINOS -->
    <div class="mb-4">
        <h4 class="fw-bold text-cartagena-blue">
            @if(Session::get('locale') == 'en') 7. Updates to Terms @else 7. Actualización de Términos @endif
        </h4>

        <p class="mt-2">
            @if(Session::get('locale') == 'en')
                We may update these terms at any time. Continued use of the website after changes 
                means you accept the updated policy.
            @else
                Podemos actualizar estos términos en cualquier momento. El uso continuo del sitio 
                después de cambios significa que aceptas la política actualizada.
            @endif
        </p>
    </div>


    <!-- SECCIÓN FINAL -->
    <p class="mt-5 text-muted">
        @if(Session::get('locale') == 'en')
            If you have questions about these Terms & Conditions, please contact us through the Support page.
        @else
            Si tienes preguntas sobre estos Términos y Condiciones, por favor contáctanos desde la página de Soporte.
        @endif
    </p>

</div>

@endsection
