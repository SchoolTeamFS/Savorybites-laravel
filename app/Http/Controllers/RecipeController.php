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
        // Convertir le slug de la catégorie en nom lisible
        $categoryName = str_replace('-', ' ', $category);
        
        // Récupérer la catégorie avec le nom converti
        $category = Category::where('name', $categoryName)->firstOrFail();
        
        // Récupérer la recette dans la catégorie spécifiée
        $recipe = Recipe::where('category_id', $category->id)
                        ->where('recipeTitle', str_replace('-', ' ', $recipeTitle)) 
                        ->firstOrFail();
        
        // Récupérer les ingrédients, étapes de préparation, commentaires, évaluations
        $ingredients = $recipe->ingredients;
        $preparationSteps = $recipe->preparationSteps;
        $comments = $recipe->comments;
        $ratings = $recipe->ratings;
        
        // Passer la catégorie et la recette à la vue
        return view('recipes.show', compact('recipe', 'ingredients', 'preparationSteps', 'comments', 'ratings', 'category'));
    }
    
    
    /**
     * Display the specified resource.
     */





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
