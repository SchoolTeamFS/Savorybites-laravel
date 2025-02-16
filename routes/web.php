<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
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
    Route::get('/manage-users/add-user', [ManagerController::class, 'create'])->name('manage-user.add');
    Route::post('/manage-users', [ManagerController::class, 'store'])->name('manage-user.store');
    Route::get('/update-user/{id}', [ManagerController::class, 'edit'])->name('manage-user.edit');
    Route::patch('/update-user/{id}', [ManagerController::class, 'update'])->name('manage-user.update');
    Route::delete('/update-user/{id}', [ManagerController::class, 'destroy'])->name('manage-user.destroy');
    Route::get('/export-recipes', [RecipeController::class, 'exportCSV'])->name('recipes.export');
    Route::get('/export-users', [UserController::class, 'exportCSV'])->name('users.export');
    //les routes pour recipes
    Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
    Route::get('/recipes/create', [RecipeController::class, 'create'])
        ->name('recipes.create')
        ->middleware('auth');
    Route::post('/recipes', [RecipeController::class, 'store'])
        ->name('recipes.store')
        ->middleware('auth');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
});



// Category listing route
Route::get('/categories', [CategoryController::class, 'index'])->name('recipes.listcateg');


Route::get('/{category}/{title}', [RecipeController::class, 'show'])->name('recipe.show');
// Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipe.show');
// Category detail route (e.g., list all recipes within a category)
Route::get('/{category}', [CategoryController::class, 'showCategory'])->name('recipes.categ');
use App\Http\Controllers\CommentController;

Route::post('/recipe/{recipe}/comment', [CommentController::class, 'store'])->name('comments.store');
// Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');
Route::get('/', [RecipeController::class, 'popularCategories'])->name('home');

Route::post('/recipe/{recipeId}/comment', [CommentController::class, 'store'])->name('comments.store');
Route::put('/comment/{commentId}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comment/{commentId}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/', [RecipeController::class, 'topRecipes'])->name('home');
