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
    {//bdaw commentaire mnhna
         // Fetch all users and comments
         $users = User::all();
         $comments = Comment::all();
         
         // Count total users and comments
         $totalUsers = $users->count();
         $totalComments = $comments->count();
     
         // Count comments per user
         $userCommentCounts = $comments->groupBy('utilisateur_id')->map->count();
         
         // Get top active users
         $topActiveUsers = $users->filter(fn ($user) => isset($userCommentCounts[$user->id]))
             ->map(fn ($user) => [
                 'username' => $user->name,
                 'email' => $user->email,
                 'commentCount' => $userCommentCounts[$user->id] ?? 0
             ])
             ->sortByDesc('commentCount')
             ->take(10);

        // Calculate total rating and average rating
        $recipes = Recipe::with('ratings')->get();
        // Calculate total rating and average rating
        $totalRating = $recipes->flatMap->ratings->sum('rating');
        $totalRecipes = $recipes->count();
        $averageRating = $totalRating ? round($totalRating / $totalRecipes, 2) : 0;

        // Define the color array
        $color = [
            ['color' => '#FF6838'],
            ['color' => '#FFC820'],
            ['color' => '#97C95C'],
            ['color' => '#1CB2F6'],
            ['color' => '#1685B8'],
            ['color' => '#e6df5d'],
            ['color' => '#ff3838']
        ];
        // Calculate category ratings
        // Get the categories
        $categories = Category::all();
        $categoryRatings = [];
         // Loop over categories and colors
        foreach ($categories as $index => $category) {
            // Get the total rating for recipes in this category
            $categoryRecipes = $category->recipes;
            $categoryRating = $categoryRecipes->flatMap->ratings->sum('rating');
            
            // Calculate the percentage of the total rating for this category
            $percentage = $totalRating ? round($categoryRating / $totalRating, 2) : 0;

            // Ensure that the category color corresponds to the category
            $categoryRatings[] = [
                'category' => $category->name,
                'rating' => $categoryRating,
                'percentage' => $percentage,
                'color' => $color[$index]['color'] ?? '#FFFFFF'  // Default to white if no color is found
            ];
        }

 
         // Share data with all views
         View::share([
            'totalUsers' => $totalUsers,
            'totalComments' => $totalComments,
            'topActiveUsers' => $topActiveUsers,
            'averageRating' => $averageRating,
            'categoryRatings' => $categoryRatings,
        ]);//bdaw commentaire mnhna
    }
}
