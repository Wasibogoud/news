<?php

use Illuminate\Support\Facades\Route;
use App\Models\Noticia;

Route::get('/noticias', function () {
    $noticias = Noticia::latest()->get();

    if ($noticias->isEmpty()) {
        return response()->json([
            'message' => 'No hay noticias almacenadas aún.'
        ], 200);
    }

    return response()->json($noticias);
});
