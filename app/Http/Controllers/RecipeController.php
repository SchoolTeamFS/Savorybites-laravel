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
