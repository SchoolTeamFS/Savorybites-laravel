<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Recipe; 
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function store(Request $request, $recipeId)
    {
        $request->validate([
            'content' => 'required|string',
            'rating' => 'numeric|min:1|max:5',
        ]);
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->utilisateur_id = auth()->id(); 
        $comment->recipe_id = $recipeId;
        $comment->save();
        $rating = Rating::where('utilisateur_id', auth()->id())
                        ->where('recipe_id', $recipeId)
                        ->first();

        if ($rating) {
            $rating->rating = $request->rating;
            $rating->save();
        } else {
            $rating = new Rating();
            $rating->rating = $request->rating;
            $rating->utilisateur_id = auth()->id();
            $rating->recipe_id = $recipeId;
            $rating->save();
        }

        $recipe = Recipe::findOrFail($recipeId); 
        return redirect()->route('recipe.show', [
            'category' => Str::slug($recipe->category->name),
            'title' => Str::slug($recipe->recipeTitle),
        ])->with('success', 'Commentaire ajouté avec succès!');
    }
    public function update(Request $request, $commentId)
    {
    $comment = Comment::findOrFail($commentId);
    if ($comment->utilisateur_id !== auth()->id()) {
        return redirect()->back()->with('error', 'Vous ne pouvez modifier que vos propres commentaires.');
    }
    $request->validate([
        'content' => 'required|string',
        'rating' => 'required|numeric|min:1|max:5', 
    ]);
    $comment->content = $request->content;
    $rating = Rating::where('utilisateur_id', auth()->id())
                    ->where('recipe_id', $comment->recipe_id)
                    ->first();

    if ($rating) {
        $rating->rating = $request->rating; 
        $rating->save();
    }
    $comment->save();
    $recipe = Recipe::findOrFail($comment->recipe_id);
    return redirect()->route('recipe.show', [
        'category' => Str::slug($recipe->category->name),
        'title' => Str::slug($recipe->recipeTitle),
    ])->with('success', 'Commentaire et note mis à jour avec succès!');
}

    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        if ($comment->utilisateur_id === auth()->id() || auth()->user()->utilisateur->role->name === 'admin') {
            $comment->delete();
            $rating = Rating::where('utilisateur_id', auth()->id())
                            ->where('recipe_id', $comment->recipe_id)
                            ->first();
    
            if ($rating) {
                $rating->delete();
            }
    
            return redirect()->back()->with('success', 'Commentaire et note supprimés avec succès!');
        }
    
        return redirect()->back()->with('error', 'Vous ne pouvez supprimer que vos propres commentaires.');
    }
    
}
