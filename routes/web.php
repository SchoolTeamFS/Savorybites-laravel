<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
Route::get('/categories',[CategoryController::class,'index'])->name('recipes.listcateg');

Route::get('/{category}/{title}', [RecipeController::class, 'show'])->name('recipe.show');
Route::get('/{category}', [CategoryController::class, 'showCategory'])->name('recipes.categ');

// Route::get('/recipe/{id}', [RecipeController::class, 'show']);
// Route::get('/recette/{id}', [RecipeController::class, 'show'])->name('recipes.show');

require __DIR__.'/auth.php';
