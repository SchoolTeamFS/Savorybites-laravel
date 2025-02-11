<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Comment;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Affiche le tableau de bord de l'utilisateur authentifié.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        $recipes = Recipe::all();
        $totalUsers = $users->count();
        
        // Fetch all comments
        $comments = Comment::all();
        $totalComments = $comments->count();
    
        // Count comments per user
        $userCommentCounts = $comments->groupBy('user_id')->map->count();
        
        // Get top active users
        $TopActiveUsers = $users->filter(fn ($user) => isset($userCommentCounts[$user->id]))
            ->map(fn ($user) => [
                'username' => $user->name,
                'email' => $user->email,
                'commentCount' => $userCommentCounts[$user->id] ?? 0
            ])
            ->sortByDesc('commentCount')
            ->take(10);
    
        return view('dashboard', compact('user', 'totalUsers', 'totalComments', 'TopActiveUsers'));
    }
    
}
