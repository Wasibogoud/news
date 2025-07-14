<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Carta; // Asegúrate de importar el modelo

class CartaController extends Controller
{
    public function mostrar()
    {
        $response = Http::get("https://db.ygoprodeck.com/api/v7/randomcard.php");

        if (!$response->successful()) {
            return view('carta')->with('carta', null);
        }

        $data = $response->json()['data'][0];

        $carta = [
            'name' => $data['name'],
            'desc' => $data['desc'],
            'type' => $data['type'],
            'race' => $data['race'] ?? null,
            'attribute' => $data['attribute'] ?? null,
            'atk' => $data['atk'] ?? null,
            'def' => $data['def'] ?? null,
            'level' => $data['level'] ?? null,
            'image_url' => $data['card_images'][0]['image_url'] ?? null,
            'url' => $data['ygoprodeck_url'] ?? null
        ];

        // Guardar en la base de datos si no existe
        Carta::firstOrCreate(
            ['name' => $carta['name']], // clave única
            $carta
        );

        return view('carta', compact('carta'));
    }
}
