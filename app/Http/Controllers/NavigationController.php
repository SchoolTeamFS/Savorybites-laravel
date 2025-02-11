<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NavigationController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $user = Auth::user();

        // return $categories;
        return view('layouts.navigation', ['user' => $user, 'categories' =>$categories]);
        return view('layouts.navigation')->with('categories')->with('user');
    }
}

