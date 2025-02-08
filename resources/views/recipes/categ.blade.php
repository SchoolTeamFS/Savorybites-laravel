@extends('recipes.app')
@section('content')
<nav>
    <p>
        <a href="{{ url('/') }}">Home</a> 
        @isset($category)
            > <a href="{{ route('recipes.categ', ['category' => str_replace(' ', '-', $category->name)]) }}">
                {{ $category->name }}
            </a>
        @endisset
    </p>
</nav>
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
