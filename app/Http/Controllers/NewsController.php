<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use app\Moldels\Noticia;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apiKey = env('NYT_API_KEY');
        $url = "https://api.nytimes.com/svc/topstories/v2/home.json?api-key={$apiKey}";
        
        $response = Http::get($url);

        $articles = [];

        if ($response->successful()) {
            $data = $response->json();
            $allArticles = $data['results'] ?? [];

            // Selecciona aleatoriamente 6 noticias
            shuffle($allArticles);
            $articles = array_slice($allArticles, 0, request('count', 6));
        }   else {
            $articles = news::latest()->take(6)->get();
        }

        return view('welcome', compact('articles'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'required|string',
            'url' => 'nullable|url',
            'image' => 'nullable|string',
            'published_at' => 'nullable|date',
            'source_id' => 'nullable|integer',
        ]);

        $news = news::create($validated);

        return response()->json($news, 201); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = news::find($id);

        if (!$news) {
            return response()->json(['message' => 'Noticia no encontrada'], 404);
        }

        return response()->json($news, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = news::find($id);

        if (!$news) {
            return response()->json(['message' => 'Noticia no encontrada'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'sometimes|required|string',
            'url' => 'nullable|url',
            'image' => 'nullable|string',
            'published_at' => 'nullable|date',
            'source_id' => 'nullable|integer',
        ]);

        $news->update($validated);

        return response()->json($news, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
   {
        $news = news::find($id);

        if (!$news) {
            return response()->json(['message' => 'Noticia no encontrada'], 404);
        }

        $news->delete();

        return response()->json(['message' => 'Noticia eliminada correctamente'], 200);
    }
}