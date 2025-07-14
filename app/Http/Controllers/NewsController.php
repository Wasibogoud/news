<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(news::all());
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