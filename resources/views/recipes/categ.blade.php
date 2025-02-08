@extends('recipes.app')
@section('content')
    <h1>categ:{{ $categoryName }}</h1>

    <ul>
        @foreach($recipes as $recipe)
            <li>
                <a href="{{ route('recipe.show', ['category' => Str::slug($categoryName), 'title' => Str::slug($recipe->recipeTitle)]) }}">
                    {{ $recipe->recipeTitle }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
