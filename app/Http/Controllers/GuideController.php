<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function index()
    {
        // --- LISTA COMPLETA DE 30 EXPERIENCIAS ---
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
            // 🔥 AQUI VA TODA LA LISTA COMPLETA DE TUS 30 ACTIVIDADES 🔥
            // (copia las 30 actividades tal cual como las tienes en tu versión previa)
        ];

        return view('guides.index', compact('guides'));
    }
}
