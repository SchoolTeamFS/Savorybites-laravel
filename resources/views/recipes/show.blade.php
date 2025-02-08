@extends('recipes.app')
@section('content')

    {{-- Affichage du chemin --}}
    <nav>
        <p>
            <a href="{{ url('/categories') }}">Categories</a> 
            @isset($category)
                > <a href="{{ route('recipes.categ', ['category' => str_replace(' ', '-', $category->name)]) }}">
                    {{ $category->name }}
                </a>
            @endisset
            @isset($recipe)
                > {{ $recipe->recipeTitle }}
            @endisset
        </p>
    </nav>

    <h1>{{ $recipe->recipeTitle }}</h1>
    <h3>{{ $recipe->description }}</h3>
    <img src="{{ asset($recipe->picture) }}" alt="{{ $recipe->recipeTitle }}">
    <h4>Publié le : {{ $recipe->created_at->format('d M Y') }}</h4>

    <h2>Ingredients</h2>
    <ul>
        @foreach($ingredients as $ingredient)
            <li>{{ $ingredient->ingredient }}</li>
        @endforeach
    </ul>

    <h2>Preparations steps</h2>
    <ol>
        @foreach($preparationSteps as $step)
            <li>{{ $step->step }}</li>
        @endforeach
    </ol>

    <h2>Comments</h2>
    <ul>
        @foreach($comments as $comment)
            <li>{{ $comment->content }} - Par {{ $comment->utilisateur->name }}</li>
        @endforeach
    </ul>

    <h2>Raiting</h2>
    <ul>
        @foreach($ratings as $rating)
            <li>{{ $rating->rating }} / 5</li>
        @endforeach
    </ul>

@endsection
