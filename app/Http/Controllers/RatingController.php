<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Store a new rating for a recipe.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $recipeId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $recipeId)
    {
        // $existingRating = Rating::where('recipe_id', $recipeId)
        //     ->where('utilisateur_id', Auth::id())
        //     ->first();

        // if ($existingRating) {
        //     return redirect()->back()->with('error', 'Vous avez déjà noté cette recette.');
        // }

        // $rating = new Rating();
        // $rating->utilisateur_id = Auth::id();
        // $rating->recipe_id = $recipeId;
        // $rating->rating = $request->input('rating');  

        // $rating->save();

        // return redirect()->route('recipe.show', $recipeId)->with('success', 'Votre note a été enregistrée.');
    }
}
