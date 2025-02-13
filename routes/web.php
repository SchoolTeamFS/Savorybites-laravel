<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;

// Include the auth routes provided by Laravel Breeze or your auth scaffolding.
require __DIR__.'/auth.php';


// Home page route
Route::get('/', function () {
    return view('layouts.home');
})->name('home');

// dashboard page route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


// Group routes that require authentication
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Favorites Route (Note: Using GET for favorites display)
    Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite');
    
    Route::get('/manage-users', [ManagerController::class, 'index'])->name('manage-users');
    Route::get('/update-user/{id}', [ManagerController::class, 'edit'])->name('manage-user.edit');
    Route::patch('/update-user/{id}', [ManagerController::class, 'update'])->name('manage-user.update');
    Route::delete('/update-user/{id}', [ManagerController::class, 'destroy'])->name('manage-user.destroy');
});
// Recipe listing route (specific route should come first)
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');

// Category listing route
Route::get('/categories', [CategoryController::class, 'index'])->name('recipes.listcateg');


// Recipe detail route, expecting both a category slug and a title parameter
Route::get('/{category}/{title}', [RecipeController::class, 'show'])->name('recipe.show');

// Category detail route (e.g., list all recipes within a category)
Route::get('/{category}', [CategoryController::class, 'showCategory'])->name('recipes.categ');
<<<<<<< HEAD

=======
use App\Http\Controllers\CommentController;

Route::post('/recipe/{recipe}/comment', [CommentController::class, 'store'])->name('comments.store');
>>>>>>> c68de3db6f1a75d6143039f75c1d90e840d5befd%