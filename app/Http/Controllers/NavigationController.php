<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NavigationController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        $user = Auth::user();

        return view('layouts.navigation', compact('categories', 'user'));
    }
}

