<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProfileServiceProvider extends ServiceProvider
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
        View::composer('profile.partials.update-profileinformation', function ($view) {
            

            $user = Auth::check() ? Auth::user()->load('utilisateur.role') : null;

            $view->with([
                'user' => $user
            ]);
        });
        //bdaw commentaire mnhna
    }
}
