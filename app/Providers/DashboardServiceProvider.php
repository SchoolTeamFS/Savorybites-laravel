<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         $users = User::all();
         $comments = Comment::all();
         
         $totalUsers = $users->count();
         $totalComments = $comments->count();
     
         $userCommentCounts = $comments->groupBy('utilisateur_id')->map->count();
         
         $topActiveUsers = $users->filter(fn ($user) => isset($userCommentCounts[$user->id]))
             ->map(fn ($user) => [
                 'username' => $user->name,
                 'email' => $user->email,
                 'commentCount' => $userCommentCounts[$user->id] ?? 0
             ])
             ->sortByDesc('commentCount')
             ->take(10);

        $recipes = Recipe::with('ratings')->get();

        $totalRating = $recipes->flatMap->ratings->sum('rating');
        $averageRating = $recipes->flatMap->ratings->avg('rating');

        $color = [
            ['color' => '#FF6838'],
            ['color' => '#FFC820'],
            ['color' => '#97C95C'],
            ['color' => '#1CB2F6'],
            ['color' => '#1685B8'],
            ['color' => '#e6df5d'],
            ['color' => '#eb0000']
        ];

        $categories = Category::all();
        $categoryRatings = [];

        foreach ($categories as $index => $category) {

            $categoryRecipes = $category->recipes;
            $categoryRating = $categoryRecipes->flatMap->ratings->sum('rating');
            
            $percentage = $totalRating ? round($categoryRating / $totalRating, 2) : 0;

            $categoryRatings[] = [
                'category' => $category->name,
                'rating' => $categoryRating,
                'percentage' => $percentage,
                'color' => $color[$index]['color'] ?? '#FFFFFF'  
            ];
        }

        View::share([
            'totalUsers' => $totalUsers,
            'totalComments' => $totalComments,
            'topActiveUsers' => $topActiveUsers,
            'averageRating' => $averageRating,
            'categoryRatings' => $categoryRatings,
        ]);
    }
}
