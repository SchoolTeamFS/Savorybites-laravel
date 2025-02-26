<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class NavigationServiceProvider extends ServiceProvider
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
        View::composer('layouts.navigation', function ($view) {

            $categories = Category::all();

            $user = Auth::check() ? Auth::user()->load('utilisateur.role') : null;

            $view->with([
                'categories' => $categories,
                'user' => $user
            ]);
        });
        //bdaw commentaire mnhna
    }
}
