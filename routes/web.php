<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Models\Noticia;
use App\Http\Controllers\CartaController;

Route::get('/carta', [CartaController::class, 'mostrar'])->name('carta.aleatoria');

Route::get('/', [NewsController::class, 'index']); // Página principal con noticias

Route::get('/noticias-locales', function () {
    $noticias = Noticia::latest()->take(10)->get();
    return view('noticias', compact('noticias'));
});
