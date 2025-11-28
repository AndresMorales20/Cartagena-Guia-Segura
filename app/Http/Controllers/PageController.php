<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $guides = [

            [
                'name' => 'Walking Tour: Historic Center and Walls',
                'specialty' => 'Certified tour of the Old Town and Walls. Emphasis on colonial architecture.',
                'rating' => '4.8',
                'reviews' => 2200,
                'status' => 'Verified',
                'keywords' => 'History, Center, Walled, Fort',
                'location' => 'Cartagena Old Town',
                'image_url' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/27/18/9c/5c/cartagena-centro-historico.jpg?w=900&h=500&s=1',
            ],
            [
                'name' => 'Visit to San Felipe de Barajas Castle',
                'specialty' => 'Guided exploration of the fort, tunnels, and viewpoints.',
                'rating' => '4.7',
                'reviews' => 6500,
                'status' => 'Verified',
                'keywords' => 'Fort, Castle, History',
                'location' => 'San Felipe de Barajas Castle',
                'image_url' => 'https://fotografias.lasexta.com/clipping/cmsimages02/2022/02/20/FF63FE70-F30A-4AA2-A3D9-0CB37EE33796/103.jpg',
            ],
            [
                'name' => 'Excursion to Rosario Islands and Snorkel',
                'specialty' => 'Full-day boat trip to the nearby islands with light diving activities.',
                'rating' => '4.5',
                'reviews' => 450,
                'status' => 'In Process',
                'keywords' => 'Boat, Islands, Sea, Rosario, Snorkel',
                'location' => 'Islas del Rosario',
                'image_url' => 'https://mediaim.expedia.com/destination/1/2d925b68edff8855928174337ec11a1b.jpg',
            ],
            [
                'name' => 'Sunset Catamaran Cruise on the Bay',
                'specialty' => 'Sunset Catamaran cruise along Cartagena Bay.',
                'rating' => '4.6',
                'reviews' => 3400,
                'status' => 'Verified',
                'keywords' => 'Boat, Cruise, Sea, Sunset',
                'location' => 'Cartagena Bay',
                'image_url' => 'https://aventureros360.com.co/wp-content/uploads/2025/03/CASTILLO-DE-SAN-FELIPE-viajar-a-colombia-aventureros-360.jpg',
            ],
            [
                'name' => 'Getsemaní Murals and Culture Tour',
                'specialty' => 'Discovery of murals, street art, and life in Plaza de la Trinidad.',
                'rating' => '4.7',
                'reviews' => 1000,
                'status' => 'Verified',
                'keywords' => 'Crafts, Getsemaní, Murals, Culture',
                'location' => 'Plaza de la Trinidad, Getsemaní',
                'image_url' => 'https://www.restaurantedapietro.com/wp-content/uploads/2024/08/grafitti-en-cartaagena-1024x683.jpg',
            ],
            [
                'name' => 'Coastal Cuisine Class and Bazurto Market',
                'specialty' => 'Gastronomic experience in Bazurto Market and preparation of typical dishes.',
                'rating' => '4.3',
                'reviews' => 150,
                'status' => 'Verified',
                'keywords' => 'Cooking, Markets, Food, Bazurto',
                'location' => 'Bazurto Market, Cartagena',
                'image_url' => 'https://www.baytours.com.co/wp-content/uploads/2022/10/bazurtooo.jpg',
            ],
            [
                'name' => 'Visit to the Convent of La Popa',
                'specialty' => 'Ascent to the highest point in Cartagena for panoramic city views.',
                'rating' => '4.8',
                'reviews' => 2600,
                'status' => 'In Process',
                'keywords' => 'Views, Popa, History',
                'location' => 'Convento de la Popa de la Galera',
                'image_url' => 'https://fotografias.lasexta.com/clipping/cmsimages02/2023/07/12/F878EA06-C919-4893-B00B-D3FA0A04648A/convento-santa-cruz-popa-cartagena-indias-motivo-curioso-nombre-sus-leyendas_98.jpg',
            ],
            [
                'name' => 'Totumo Volcano Excursion',
                'specialty' => 'Warm mud bath with healing properties in the Mud Volcano.',
                'rating' => '4.4',
                'reviews' => 750,
                'status' => 'In Process',
                'keywords' => 'Volcano, Mud, Adventure',
                'location' => 'Volcán de barro del Totumo',
                'image_url' => 'https://cdn-ilcfjhh.nitrocdn.com/AMsOVcaxJEBiDUJmLghgteLoXmGyZJhB/assets/images/optimized/rev-c540b75/cartagena-tours.co/wp-content/uploads/2023/01/2.png',
            ],
            [
                'name' => 'Zenú Gold Museum Tour',
                'specialty' => 'Tour of pre-Columbian pieces and the history of the Zenú culture.',
                'rating' => '4.6',
                'reviews' => 10000,
                'status' => 'Verified',
                'keywords' => 'History, Art, Museums, Center',
                'location' => 'Museo del Oro (Museo de Oro Zenu)',
                'image_url' => 'https://d3nmwx7scpuzgc.cloudfront.net/sites/default/files/media/image/museo-del-oro-zenu-reapertura-sala-exhibicion-piso-2.jpg',
            ],
            [
                'name' => 'Visit to the Cathedral of Santa Catalina de Alejandría',
                'specialty' => 'Tour of the main church in the historic center.',
                'rating' => '4.7',
                'reviews' => 380,
                'status' => 'Verified',
                'keywords' => 'History, Colonial, Architecture, Center',
                'location' => 'Catedral de Santa Catalina de Alejandría',
                'image_url' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1a/2a/04/6d/20191124-193000-largejpg.jpg',
            ],
            [
                'name' => 'Salsa and Caribbean Rhythms Class',
                'specialty' => 'Practical dance class in a traditional Getsemaní setting.',
                'rating' => '4.9',
                'reviews' => 90,
                'status' => 'Verified',
                'keywords' => 'Dance, Culture, Night',
                'location' => 'Plaza de la Trinidad, Getsemaní',
                'image_url' => 'https://es.discovercartagena.com.co/wp-content/uploads/2023/06/04DC_CARTAGENA-SALSA-CHAMPETA-_-CUMBIA-LESSONS--jpg.webp',
            ],
            [
                'name' => 'Photo Tour of the Walled City',
                'specialty' => 'Guided photo session to capture the best angles of the city.',
                'rating' => '4.7',
                'reviews' => 180,
                'status' => 'Verified',
                'keywords' => 'Photos, Center, Walled',
                'location' => 'Las Murallas de Cartagena',
                'image_url' => 'https://cdn-ilcfjhh.nitrocdn.com/AMsOVcaxJEBiDUJmLghgteLoXmGyZJhB/assets/images/optimized/rev-c540b75/cartagena-tours.co/wp-content/uploads/2023/12/https___tr2storage.blob_.core_.windows.net_imagenes_RWezTU2DJGds-6MWNnYXiz5vyxLE.jpg',
            ],
            [
                'name' => 'Tour of Las Bóvedas',
                'specialty' => 'Visit to the old military warehouses transformed into handicraft shops.',
                'rating' => '4.5',
                'reviews' => 1200,
                'status' => 'Verified',
                'keywords' => 'Crafts, Shopping, History',
                'location' => 'Las Bovedas',
                'image_url' => 'https://fotografias.lasexta.com/clipping/cmsimages01/2024/12/20/FB7792BA-E54F-4519-B760-891BE65CEF36/cuartel-bovedas-cartagena-indias_103.jpg',
            ],
            [
                'name' => 'Visit to the National Aviary of Colombia',
                'specialty' => 'Excursion to observe hundreds of bird species in a natural environment.',
                'rating' => '4.9',
                'reviews' => 700,
                'status' => 'In Process',
                'keywords' => 'Nature, Birds, Fauna',
                'location' => 'Aviario Nacional de Colombia',
                'image_url' => 'https://tourporelcaribe.com/wp-content/uploads/2022/12/Aviario-nacional-Animo-Colombia-Las-aves-estan-contigo.jpg',
            ],
            [
                'name' => 'Modern Art Museum Tour',
                'specialty' => 'Discover paintings and sculptures from Colombia and abroad.',
                'rating' => '4.3',
                'reviews' => 850,
                'status' => 'Verified',
                'keywords' => 'Art, Museums, Center',
                'location' => 'Museo de Arte Moderno de Cartagena',
                'image_url' => 'https://viajandox.com.co/uploads/Museo%20de%20Arte%20Moderno_1.jpg',
            ],
            [
                'name' => 'Night Walk along Santo Domingo Bastion',
                'specialty' => 'Night tour with wall views and visit to the Santo Domingo Bastion.',
                'rating' => '4.6',
                'reviews' => 950,
                'status' => 'Verified',
                'keywords' => 'Night, History, Walled',
                'location' => 'Baluarte Santo Domingo',
                'image_url' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/30/67/0c/ad/en-el-baluarte-santo.jpg',
            ],
            [
                'name' => 'Gabriel García Márquez Literary Route',
                'specialty' => 'Thematic tour through the places that inspired the Nobel laureate in the city.',
                'rating' => '4.8',
                'reviews' => 300,
                'status' => 'Verified',
                'keywords' => 'History, Literature, Gabo, Center',
                'location' => 'Manga neighborhood and Historic Center',
                'image_url' => 'https://qpwebsite.s3.amazonaws.com/uploads/2024/06/rss-efe6ee92ff838a1bd91eb930e0b9334682271a195c9w.jpg',
            ],
            [
                'name' => 'Chiva Rumbera Tour',
                'specialty' => 'Party bus ride with live music along the main avenues.',
                'rating' => '4.4',
                'reviews' => 1500,
                'status' => 'In Process',
                'keywords' => 'Party, Night, Music',
                'location' => 'Departure from Bocagrande/Clock Tower',
                'image_url' => 'https://aventureros360.com.co/wp-content/uploads/2025/08/promocion-Chiva-2x1-portada-4-1-600x450.jpg',
            ],
            [
                'name' => 'Excursion to Playa Blanca, Barú',
                'specialty' => 'Transfer and beach day on the white sands of the Barú Peninsula.',
                'rating' => '4.1',
                'reviews' => 9000,
                'status' => 'In Process',
                'keywords' => 'Beach, Sea, Barú',
                'location' => 'Playa Blanca, Isla de Barú',
                'image_url' => 'https://cdn.atrapalo.com/o/event/4922493/1643306.jpg',
            ],
            [
                'name' => 'Visit to the Caribbean Naval Museum',
                'specialty' => 'Exploration of the city\'s maritime history, pirates, and fortifications.',
                'rating' => '4.5',
                'reviews' => 420,
                'status' => 'Verified',
                'keywords' => 'History, Museums, Sea',
                'location' => 'Museo Naval del Caribe',
                'image_url' => 'https://www.colombiaencifras.com/wp-content/uploads/2025/05/WhatsApp-Image-2025-05-12-at-3.44.24-PM.jpeg',
            ],
            [
                'name' => 'Carriage Ride through the Old City',
                'specialty' => 'Traditional tour through the colonial streets by carriage.',
                'rating' => '4.3',
                'reviews' => 2800,
                'status' => 'Verified',
                'keywords' => 'Romance, Center, History',
                'location' => 'Plaza de los Coches',
                'image_url' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/18/26/dc/ab/paseo-en-coche-tirado.jpg',
            ],
            [
                'name' => 'Bocagrande and Castillogrande Route',
                'specialty' => 'Modernity tour and beaches of Bocagrande, Castillogrande, and El Laguito.',
                'rating' => '4.2',
                'reviews' => 1100,
                'status' => 'In Process',
                'keywords' => 'Beach, Bocagrande, Modernity',
                'location' => 'Bocagrande Coastline',
                'image_url' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0d/f5/1e/be/bocagrande-desde-el-hotel.jpg',
            ],
            [
                'name' => 'Paila Ice Cream Class and Fruit Tasting',
                'specialty' => 'Artisanal ice cream workshop and tasting of exotic Caribbean fruits.',
                'rating' => '4.7',
                'reviews' => 120,
                'status' => 'Verified',
                'keywords' => 'Food, Gastronomy, Workshop',
                'location' => 'Portal de los Dulces, Center',
                'image_url' => 'https://miredvista.co/wp-content/uploads/2021/03/PORTAL-dulce.jpg',
            ],
            [
                'name' => 'Tour of the Palace of the Inquisition',
                'specialty' => 'Visit to the Historical Museum of Cartagena de Indias focusing on the colonial past.',
                'rating' => '4.6',
                'reviews' => 1800,
                'status' => 'Verified',
                'keywords' => 'History, Museums, Center',
                'location' => 'Palacio de la Inquisición',
                'image_url' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/a1/38/b5/the-view-of-templo-de.jpg',
            ],
            [
                'name' => 'Kayak Ride through the La Boquilla Mangroves',
                'specialty' => 'Kayak tour through the mangrove ecosystems of La Boquilla.',
                'rating' => '4.5',
                'reviews' => 320,
                'status' => 'In Process',
                'keywords' => 'Nature, Kayak, Mangroves',
                'location' => 'La Boquilla, Cartagena',
                'image_url' => 'https://www.rutaschile.com/configurador/fotos/Tour_Grande_2722019113753.jpg',
            ],
            [
                'name' => 'Visit to the Church of Santo Domingo',
                'specialty' => 'Tour of Cartagena\'s oldest church and the Plaza de Santo Domingo.',
                'rating' => '4.7',
                'reviews' => 500,
                'status' => 'Verified',
                'keywords' => 'History, Religion, Center',
                'location' => 'Santo Domingo Church (Iglesia de Santo Domingo)',
                'image_url' => 'https://colombia.travel/sites/default/files/styles/imagen_650x450_escala_y_recorte/public/actividades/21_iglesia-y-convento-de-santo-domingo.jpg',
            ],
            [
                'name' => 'Romantic Dinner on the Baluarte Terrace',
                'specialty' => 'Exclusive gastronomic experience with views of the wall and the bay.',
                'rating' => '4.9',
                'reviews' => 800,
                'status' => 'Verified',
                'keywords' => 'Food, Night, Romance, Bastion',
                'location' => 'Baluarte de San Francisco Javier',
                'image_url' => 'https://baluartesfj.com/wp-content/uploads/2018/08/pan02.jpg',
            ],
            [
                'name' => 'Tour of Historic Squares',
                'specialty' => 'Guided tour of the iconic Plaza Bolívar and Plaza de la Aduana.',
                'rating' => '4.7',
                'reviews' => 1100,
                'status' => 'Verified',
                'keywords' => 'History, Center, Architecture, Squares',
                'location' => 'Plaza Bolívar and Plaza de la Aduana',
                'image_url' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/08/66/95/05/plaza-de-la-aduana.jpg',
            ],
            [
                'name' => 'Tour to San Basilio de Palenque',
                'specialty' => 'Cultural excursion to the first free town in the Americas and its African heritage.',
                'rating' => '4.9',
                'reviews' => 400,
                'status' => 'Verified',
                'keywords' => 'Culture, History, Palenque',
                'location' => 'San Basilio de Palenque',
                'image_url' => 'https://es.discovercartagena.com.co/wp-content/uploads/2024/05/IMG_6628-1-1024x768.webp',
            ],
            [
                'name' => 'Visit to the Sanctuary of San Pedro Claver',
                'specialty' => 'Exploration of the convent, church, and museum dedicated to San Pedro Claver.',
                'rating' => '4.7',
                'reviews' => 1600,
                'status' => 'Verified',
                'keywords' => 'History, Religion, Center',
                'location' => 'Santuario de San Pedro Claver',
                'image_url' => 'https://cartagenadeindias.travel/wp-content/uploads/2023/10/SANTUARIO-MUSEO-SAN-PEDRO-CLAVER-1.webp',
            ],

        ];

        return view('guides.index', compact('guides'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function support()
    {
        return view('pages.support');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function settings()
    {
        return view('pages.settings');
    }
}
