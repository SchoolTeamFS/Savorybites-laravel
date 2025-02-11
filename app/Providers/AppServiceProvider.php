<?php
namespace App\Providers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View::composer('layouts.navigation', function ($view) {
        //     // Récupérer les catégories
        //     $categories = Category::all();

        //     $user = Auth::check() ? Auth::user()->load('utilisateur.role') : null;

        //     $view->with([
        //         'categories' => $categories,
        //         'user' => $user
        //     ]);
        // });
    }

}
