<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }
    public function show($category, $recipeTitle)
    {
        $categoryName = str_replace('-', ' ', $category);
    
        $category = Category::where('name', $categoryName)->firstOrFail();
    
        $recipe = Recipe::where('category_id', $category->id)
                        ->where('recipeTitle', str_replace('-', ' ', $recipeTitle)) 
                        ->firstOrFail();
    
        $ingredients = $recipe->ingredients;
        $preparationSteps = $recipe->preparationSteps;
        $comments = $recipe->comments;
        $ratings = $recipe->ratings;
    
        return view('recipes.show', compact('recipe', 'ingredients', 'preparationSteps', 'comments', 'ratings'));
    }
    
    
    /**
     * Display the specified resource.
     */
//     public function show($categ, $title)
// {
//     // Trouver la catégorie
//     $category = Category::whereRaw("LOWER(REPLACE(name, ' ', '-')) = ?", [strtolower($categ)])->firstOrFail();

//     // Trouver la recette
//     $recipe = Recipe::where('category_id', $category->id)
//         ->whereRaw("LOWER(REPLACE(recipeTitle, ' ', '-')) = ?", [strtolower($title)])
//         ->firstOrFail();

//     return view('recipes.chemin', compact('category', 'recipe'));
// }

// public function show($id)
// {
//     // Charger la recette avec toutes ses relations
//     $recipe = Recipe::with([
//         'category', 
//         'ingredients', 
//         'preparationSteps', 
//         'ratings', 
//         'favorites', 
//         'comments'
//     ])->findOrFail($id);

//     // Retourner la vue avec la recette et ses informations
//     return view('recipe.show', compact('recipe'));
// }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
