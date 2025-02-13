<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;use App\Models\Recipe;
use Illuminate\Support\Str;

class CommentController extends Controller
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
    public function store(Request $request, Recipe $recipe)
    {
        // Valider la donnée
        $request->validate([
            'content' => 'required|string|max:255',
        ]);
    
        // Créer une nouvelle instance de Comment
        $comment = new Comment();
    
        // Remplir les attributs de Comment
        $comment->content = $request->content;
        $comment->recipe_id = $recipe->id;
        $comment->utilisateur_id = auth()->id(); // Si tu as un utilisateur authentifié
    
        // Sauvegarder le commentaire dans la base de données
        $comment->save();
    
        // Rediriger vers la page des détails de la recette avec un message de succès
        return redirect()->route('recipe.show', [
            'category' => Str::slug($recipe->category->name),
            'title' => Str::slug($recipe->recipeTitle),
        ])->with('success', 'Commentaire ajouté avec succès!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
