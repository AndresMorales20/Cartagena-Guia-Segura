@extends('layouts.app')

@section('title', Session::get('locale') == 'en' ? 'Verified Experiences Directory | Cartagena' : 'Directorio de Experiencias Verificadas | Cartagena')

@section('content')
<main class="container py-5">

    {{-- Título y subtítulo con traducción --}}
    <h2 class="text-dark fw-bold">
        @if (Session::get('locale') == 'en')
            Verified Experiences Directory
        @else
            Directorio de Experiencias Verificadas
        @endif
    </h2>
    <p class="lead text-muted mb-4">
        @if (Session::get('locale') == 'en')
            Explore services and exclusive activities in the most authentic tourist sites of Cartagena de Indias.
        @else
            Explora servicios y actividades exclusivas en los sitios turísticos más auténticos de Cartagena de Indias.
        @endif
    </p>

    {{-- Filtro de Botones --}}
    <div class="mb-5">
        <h3 class="fw-semibold text-cartagena-terracota">
            @if (Session::get('locale') == 'en')
                Filter Services
            @else
                Filtrar Servicios
            @endif
        </h3>

        <div class="btn-group mt-2" role="group" id="filter-buttons">
            {{-- Usamos filtros en minúscula para evitar problemas --}}
            <button type="button" class="btn btn-cartagena-terracota active" data-filter="all">
                @if (Session::get('locale') == 'en') All @else Todos @endif
            </button>
            <button type="button" class="btn btn-outline-cartagena-terracota" data-filter="cooking">
                @if (Session::get('locale') == 'en') Cooking and Markets @else Cocina y Mercados @endif
            </button>
            <button type="button" class="btn btn-outline-cartagena-terracota" data-filter="boat">
                @if (Session::get('locale') == 'en') Boat Trips @else Paseos en Bote @endif
            </button>
            <button type="button" class="btn btn-outline-cartagena-terracota" data-filter="history">
                @if (Session::get('locale') == 'en') Historic Tours @else Recorridos Históricos @endif
            </button>
            <button type="button" class="btn btn-outline-cartagena-terracota" data-filter="nature">
                @if (Session::get('locale') == 'en') Nature & Wildlife @else Naturaleza y Fauna @endif
            </button>
            <button type="button" class="btn btn-outline-cartagena-terracota" data-filter="art">
                @if (Session::get('locale') == 'en') Art & Culture @else Arte y Cultura @endif
            </button>
        </div>
    </div>

    {{-- Contenedor de Guías (Tarjetas) --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="guides-container">
        @foreach ($guides as $index => $guide)
            {{-- Guardamos keywords en minúscula en el atributo para comparaciones seguras --}}
            <div class="col guide-card" data-keywords="{{ strtolower($guide['keywords']) }}">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ $guide['image_url'] }}" class="card-img-top card-img-custom" alt="Imagen de {{ $guide['name'] }}">
                    <div class="card-body d-flex flex-column">

                        <h5 class="card-title fw-bold text-cartagena-terracota">{{ $guide['name'] }}</h5>
                        <p class="card-text text-muted small">{{ $guide['specialty'] }}</p>

                        {{-- BLOQUE DE STATUS Y RATING --}}
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge {{ $guide['status'] === 'Verified' ? 'bg-cartagena-success' : 'bg-cartagena-warning' }} text-uppercase me-2">
                                @if (Session::get('locale') == 'en')
                                    {{ $guide['status'] === 'Verified' ? 'Verified' : 'In Process' }}
                                @else
                                    {{ $guide['status'] === 'Verified' ? 'Verificado' : 'En Proceso' }}
                                @endif
                            </span>
                            <span class="text-dark-blue fw-bold">
                                <i class="bi bi-star-fill text-warning"></i> {{ $guide['rating'] }} <small>({{ number_format($guide['reviews'], 0, ',', '.') }})</small>
                            </span>
                        </div>

                        {{-- BLOQUE DE UBICACIÓN (DISEÑO AZULITO) --}}
                        <div class="location-info">
                            <i class="bi bi-pin-map-fill"></i>
                            <span>{{ $guide['location'] }}</span>
                        </div>

                        {{-- ENLACE DIRECTO A GOOGLE MAPS --}}
                        <a href="https://www.google.com/maps/search/{{ urlencode($guide['location'] . ', Cartagena, Colombia') }}"
                           target="_blank"
                           class="btn btn-block btn-teal mt-auto">
                            <i class="bi bi-globe me-2"></i>
                            @if (Session::get('locale') == 'en') Open Map @else Abrir Mapa @endif
                        </a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Mensaje de No Resultados --}}
    <div id="no-results-message" class="text-center mt-5 p-4 bg-light rounded shadow-sm" style="display: none;">
        <h3 class="text-muted"><i class="bi bi-search-x me-2"></i>
            @if (Session::get('locale') == 'en')
                No guides found with that tag.
            @else
                No se encontraron guías con esa etiqueta.
            @endif
        </h3>
        <p class="lead">
            @if (Session::get('locale') == 'en')
                Try another keyword or select "All".
            @else
                Intenta con otra palabra clave o selecciona "Todos".
            @endif
        </p>
    </div>

</main>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {

        function normalize(text) {
            return (text || '').toString().toLowerCase().trim();
        }

        $('#filter-buttons button').on('click', function () {
            var selectedFilter = normalize($(this).data('filter'));
            var $guideCards = $('.guide-card');
            var resultsFound = false;

            // 1. Reset visual state for buttons
            $('#filter-buttons button').each(function () {
                $(this).removeClass('active btn-cartagena-terracota').addClass('btn-outline-cartagena-terracota');
            });

            // 2. Set clicked button as active
            $(this).addClass('active btn-cartagena-terracota').removeClass('btn-outline-cartagena-terracota');

            // 3. Iterate and filter
            $guideCards.each(function () {
                var keywordsString = $(this).attr('data-keywords'); // string en minúsculas
                var show = false;

                if (selectedFilter === 'all') {
                    show = true;
                } else if (keywordsString) {
                    // split por comas, trim y comparar
                    var tags = keywordsString.split(',').map(function (t) { return t.trim(); });
                    // buscar coincidencia exacta entre tags o búsqueda parcial
                    for (var i = 0; i < tags.length; i++) {
                        if (tags[i] === selectedFilter || tags[i].indexOf(selectedFilter) !== -1) {
                            show = true;
                            break;
                        }
                    }
                }

                if (show) {
                    // usar fadeIn si estaba oculto
                    if ($(this).is(':hidden')) {
                        $(this).fadeIn(180);
                    } else {
                        $(this).show();
                    }
                    resultsFound = true;
                } else {
                    // usar fadeOut para mejor UX
                    if ($(this).is(':visible')) {
                        $(this).fadeOut(120);
                    } else {
                        $(this).hide();
                    }
                }
            });

            // Mostrar u ocultar el mensaje de "No resultados"
            if (resultsFound) {
                $('#no-results-message').hide();
            } else {
                $('#no-results-message').show();
            }
        });

        // Asegurar que el filtro 'all' esté activo al cargar (ejecuta una vez)
        $('#filter-buttons button[data-filter="all"]').trigger('click');
    });
</script>
@endsection
