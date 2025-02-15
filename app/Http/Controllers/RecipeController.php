<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\PreparationStep;
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
        
        $allRecipes = Recipe::with(['comments', 'ratings'])->get();

        // $topRecipes = $allRecipes->sortByDesc(fn ($recipe) => $recipe->averageRating())->take(12);
    
        return view('recipesCRUD.recepies', compact('allRecipes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
        $categories = Category::all();

     
        return view('recipesCRUD.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
      
       $validatedData = $request->validate([
        'recipeTitle' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id', 
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'ingredients' => 'required|array', 
        'ingredients.*' => 'string', 
        'preparationSteps' => 'required|array',
        'preparationSteps.*' => 'string', 
        ]);
        //ajout de recipe

        $recipe = new Recipe();
        $recipe->recipeTitle = $validatedData['recipeTitle'];
        $recipe->description = $validatedData['description'];
        $recipe->category_id = $validatedData['category_id'];
        $recipe->utilisateur_id = auth()->id(); 

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->move(public_path('imagesRecepies/Normal'), $request->file('picture')->getClientOriginalName());
            $recipe->picture = 'imagesRecepies/Normal/' . $request->file('picture')->getClientOriginalName();
        }
        
      
        $recipe->save();
        //ajout d'image
        foreach ($validatedData['ingredients'] as $ingredientName) {
            $ingredient = new Ingredient();
            $ingredient->recipe_id = $recipe->id; 
            $ingredient->ingredient = $ingredientName; 
            $ingredient->save(); 
        }

        
        foreach ($validatedData['preparationSteps'] as $order => $step) {
            $stepInstance = new PreparationStep();
            $stepInstance->recipe_id = $recipe->id;
            $stepInstance->step = $step;
            $stepInstance->order = $order + 1; 
            $stepInstance->save();
        }

       
        return redirect()->route('recipes.index')->with('success', 'La recette a été créée avec succès.');
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
        $admin=Utilisateur::where('role_id',1)->first();
        return view('recipes.show', compact('recipe', 'ingredients', 'preparationSteps', 'comments', 'ratings', 'category','admin'));
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
