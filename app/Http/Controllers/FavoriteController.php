<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $favorites = Favorite::with(['recipe', 'utilisateur'])->get();
        $userFavorites = Favorite::where('utilisateur_id', auth()->user()->id)->pluck('recipe_id')->toArray();  
        
        return view('layouts.favorite', compact('favorites', 'userFavorites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $user = auth()->user();
        $recipeId = $request->input('recipe_id');
    
        $existingFavorite = Favorite::where('utilisateur_id', $user->id)
                                    ->where('recipe_id', $recipeId)
                                    ->first();
    
        if (!$existingFavorite) {
            $favorite = new Favorite();
            $favorite->utilisateur_id = $user->id;
            $favorite->recipe_id = $recipeId;
            $favorite->save();
        }
    
        return response()->json(['status' => 'success', 'message' => 'Recipe added to favorites!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
        return redirect()->route('favorites.index')->with('success', 'Recette retirée des favoris.');
    }
}
