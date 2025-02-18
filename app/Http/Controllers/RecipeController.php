<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Favorite;
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

     
        $userFavorites = Favorite::where('utilisateur_id', auth()->id())
                                ->pluck('recipe_id')
                                ->toArray(); 

        return view('recipesCRUD.recepies', compact('allRecipes', 'userFavorites'));
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

       
        return redirect()->route('home')->with('success', 'La recette a été créée avec succès.');
    }
    public function __construct()
    {
        $this->middleware('auth')->except('topRecipes');
    }
    public function show($category, $recipeTitle)
    {
       
        $categoryName = str_replace('-', ' ', $category);
        $category = Category::where('name', $categoryName)->firstOrFail();
        $recipe = Recipe::where('category_id', $category->id)
                        ->where('recipeTitle', str_replace('-', ' ', $recipeTitle))
                        ->firstOrFail();

        
        $userFavorites = auth()->check()
            ? Favorite::where('utilisateur_id', auth()->id())
                ->pluck('recipe_id')
                ->toArray()
            : [];

        $ingredients = $recipe->ingredients;
        $preparationSteps = $recipe->preparationSteps;
        $comments = $recipe->comments;

        $ratings = $recipe->ratings()->avg('rating');
        $admin = Utilisateur::where('role_id', 1)->first();
        $relatedRecipes = Recipe::where('category_id', $recipe->category_id)
                                ->where('id', '!=', $recipe->id)
                                ->limit(3)
                                ->get();

        return view('recipes.show', compact(
            'recipe',
            'ingredients',
            'preparationSteps',
            'comments',
            'ratings',
            'category',
            'admin',
            'relatedRecipes',
            'userFavorites' 
        ));

    }
    
    
 
    public function topRecipes()
    {
        $topRecipes12 = Recipe::with(['ratings', 'category']) 
            ->get()
            ->sortByDesc(fn($recipe) => $recipe->ratings->avg('rating'))
            ->take(12);
        $topRecipes = Recipe::with(['ratings', 'category']) 
            ->get()
            ->sortByDesc(fn($recipe) => $recipe->ratings->avg('rating'))
            ->take(4);
        $recipes = Recipe::with('category')->get();
        $categories = Category::all()->pluck('image', 'name');
        $latestRecipes = Recipe::latest()->take(15)->get();
        return view('layouts.home', compact('topRecipes', 'recipes', 'categories', 'latestRecipes','topRecipes12'));

    }
    
    

    
    /**
     * Display the specified resource.
     */





    /**
     * Show the form for editing the specified resource.
     */
   
     public function edit(Recipe $recipe)
     {
       
         $categories = Category::all();
         $ingredients = $recipe->ingredients()->pluck('ingredient');
         $preparationSteps = $recipe->preparationSteps()->pluck('step');  
         return view('recipesCRUD.edit', compact('recipe', 'categories','ingredients','preparationSteps'));
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
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

        if ($recipe->utilisateur_id !== auth()->user()->utilisateur->id) {
            return redirect()->route('home')->with('error', 'You are not authorized to update this recipe.');
        }

        $recipe->recipeTitle = $validatedData['recipeTitle'];
        $recipe->description = $validatedData['description'];
        $recipe->category_id = $validatedData['category_id'];

        if ($request->hasFile('picture')) {

            if ($recipe->picture && file_exists(public_path($recipe->picture))) {
                unlink(public_path($recipe->picture));
            }
            $path = $request->file('picture')->move(public_path('imagesRecepies/Normal'), $request->file('picture')->getClientOriginalName());
            $recipe->picture = 'imagesRecepies/Normal/' . $request->file('picture')->getClientOriginalName();  // Save the relative path
        }
        $recipe->save();
        $recipe->ingredients()->delete();
        foreach ($validatedData['ingredients'] as $ingredientName) {
            $ingredient = new Ingredient();
            $ingredient->recipe_id = $recipe->id;
            $ingredient->ingredient = $ingredientName;
            $ingredient->save();
        }

    
    
        $recipe->preparationSteps()->delete();
        foreach ($validatedData['preparationSteps'] as $order => $step) {
            $stepInstance = new PreparationStep();
            $stepInstance->recipe_id = $recipe->id;
            $stepInstance->step = $step;
            $stepInstance->order = $order + 1;
            $stepInstance->save();
        }

    
        return redirect()->route('home')->with('success', 'La recette a été mise à jour avec succès.');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);

        $recipe->ingredients()->delete();
        $recipe->preparationSteps()->delete();
        $recipe->comments()->delete(); 

        $recipe->delete();

        return redirect()->route('home')->with('success', 'Recette supprimée avec succès.');
    }

    public function exportCSV()
    {
        return Excel::download(new RecipesExport, 'recipes.csv');
    }
   }
