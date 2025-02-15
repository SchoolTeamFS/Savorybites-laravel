<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Utilisateur;
use App\Exports\RecipesExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer toutes les recettes depuis la base de données
        $recipes = Recipe::with('ingredients', 'preparationSteps')->get();

        // Retourner la vue avec les données
        return view('recipesCRUD.recepies', compact('recipes'));
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
    public function __construct()
    {
        $this->middleware('auth');
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
        $admin = Utilisateur::where('role_id', 1)->first();
        $relatedRecipes = Recipe::where('category_id', $recipe->category_id)
                                ->where('id', '!=', $recipe->id)
                                ->limit(3)
                                ->get();
        return view('recipes.show', compact('recipe', 'ingredients', 'preparationSteps', 'comments', 'ratings', 'category', 'admin', 'relatedRecipes'));
    }
    
 
    public function topRecipes()
    {
        $topRecipes = Recipe::with(['ratings', 'category']) 
            ->get()
            ->sortByDesc(fn($recipe) => $recipe->ratings->avg('rating'))
            ->take(5);
        $recipes = Recipe::with('category')->get();
        $categories = Category::all()->pluck('image', 'name');
        $latestRecipes = Recipe::latest()->take(15)->get();
        return view('layouts.home', compact('topRecipes', 'recipes', 'categories', 'latestRecipes'));

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
    public function exportCSV()
    {
        return Excel::download(new RecipesExport, 'recipes.csv');
    }
   }
