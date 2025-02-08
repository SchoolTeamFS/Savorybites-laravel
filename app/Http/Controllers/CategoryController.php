<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        if (!$categories) {
            abort(404, 'Catégorie non trouvée');
        };
        return view('recipes.listcateg', ['categories'=>$categories]);
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

    /**
     * Display the specified resource.
     */
    public function showCategory($categorySlug)
    {
        $categoryName = str_replace('-', ' ', $categorySlug);
    
        $category = Category::where('name', $categoryName)->first();
    
        if (!$category) {
            abort(404, 'Catégorie non trouvée');
        }
        $recipes = $category->recipes; 
        return view('recipes.categ', compact('recipes', 'categoryName'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
