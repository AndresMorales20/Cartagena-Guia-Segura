@extends('layouts.app')

@section('title', Session::get('locale') == 'en' ? 'About Us | Cartagena App' : 'Sobre Nosotros | Cartagena App')

@section('content')

<div class="container py-5">

    <!-- TÍTULO -->
    <h2 class="fw-bold text-cartagena-terracota mb-3">
        @if(Session::get('locale') == 'en')
            About Our Project
        @else
            Sobre Nuestro Proyecto
        @endif
    </h2>

    <!-- DESCRIPCIÓN GENERAL -->
    <p class="lead text-muted">
        @if(Session::get('locale') == 'en')
            Authentic Cartagena Directory is a digital platform designed to guide tourists 
            and locals through the most authentic, cultural, and verified experiences in 
            Cartagena de Indias. Our purpose is to highlight the best activities, services, 
            and tours while promoting safe and reliable tourism.
        @else
            Authentic Cartagena Directory es una plataforma digital diseñada para guiar a 
            turistas y locales a través de las experiencias más auténticas, culturales y 
            verificadas de Cartagena de Indias. Nuestro propósito es destacar las mejores 
            actividades, servicios y tours promoviendo un turismo seguro y confiable.
        @endif
    </p>


    <!-- MISIÓN -->
    <div class="mt-5">
        <h4 class="fw-bold text-cartagena-blue">
            @if(Session::get('locale') == 'en') Our Mission @else Nuestra Misión @endif
        </h4>

        <p class="mt-2">
            @if(Session::get('locale') == 'en')
                To connect visitors with the most trustworthy and unique experiences across 
                Cartagena, ensuring cultural authenticity and promoting responsible tourism.
            @else
                Conectar a los visitantes con las experiencias más auténticas y confiables de 
                Cartagena, garantizando la autenticidad cultural y promoviendo un turismo 
                responsable.
            @endif
        </p>
    </div>


    <!-- VISIÓN -->
    <div class="mt-4">
        <h4 class="fw-bold text-cartagena-blue">
            @if(Session::get('locale') == 'en') Our Vision @else Nuestra Visión @endif
        </h4>

        <p class="mt-2">
            @if(Session::get('locale') == 'en')
                To become the leading digital platform for safe tourism in the Caribbean region, 
                known for reliability, transparency, and cultural enrichment.
            @else
                Convertirnos en la plataforma digital líder para el turismo seguro en la región 
                del Caribe, reconocida por su confiabilidad, transparencia y enriquecimiento 
                cultural.
            @endif
        </p>
    </div>


    <!-- INFORMACIÓN DEL NEGOCIO -->
    <div class="mt-5 p-4 rounded shadow-sm" style="background-color: #fff;">
        <h4 class="fw-bold text-cartagena-terracota mb-3">
            @if(Session::get('locale') == 'en') Business Information @else Información del Negocio @endif
        </h4>

        <p class="mb-1">
            <i class="bi bi-geo-alt-fill text-cartagena-blue"></i>
            Calle 32 #7–145, Centro Histórico, Cartagena de Indias
        </p>

        <p class="mb-1">
            <i class="bi bi-telephone-fill text-cartagena-blue"></i>
            (+57) 305 341 4574
        </p>

        <p class="mb-1">
            <i class="bi bi-envelope-fill text-cartagena-blue"></i>
            support@cartagenadirectory.com
        </p>

        <p class="mb-1">
            <i class="bi bi-clock-fill text-cartagena-blue"></i>
            @if(Session::get('locale') == 'en')
                Hours: Monday–Saturday 8:00 AM–6:00 PM / Sunday 9:00 AM–3:00 PM
            @else
                Horarios: Lunes–Sábado 8:00 AM–6:00 PM / Domingo 9:00 AM–3:00 PM
            @endif
        </p>
    </div>


    <!-- EQUIPO / QUIÉNES SOMOS -->
    <div class="mt-5">
        <h4 class="fw-bold text-cartagena-blue mb-3">
            @if(Session::get('locale') == 'en') Who We Are @else Quiénes Somos @endif
        </h4>

        <p class="text-muted">
            @if(Session::get('locale') == 'en')
                We are a passionate team of developers and content creators focused on 
                delivering a modern, efficient, and visually appealing tourism platform. 
                Our goal is to enhance the digital experience of travelers while highlighting 
                the cultural richness of Cartagena.
            @else
                Somos un equipo apasionado de desarrolladores y creadores de contenido 
                enfocados en ofrecer una plataforma turística moderna, eficiente y visualmente 
                atractiva. Nuestro objetivo es mejorar la experiencia digital de los viajeros 
                resaltando la riqueza cultural de Cartagena.
            @endif
        </p>
    </div>

</div>

@endsection
