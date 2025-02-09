@extends('recipes.app')

@section('content')

    <style>
        nav p {
            font-style: italic;
            color: gray;
            margin-left: 40px;
        }

        nav a {
            color: gray;
            text-decoration: none;
            text-transform: uppercase;
        }

        nav a:hover {
            color: darkgray;
        }
    </style>

    <nav>
        <p>
            <a href="{{ url('/categories') }}">Categories</a> 
            @isset($category)
                > <a href="{{ route('recipes.categ', ['category' => str_replace(' ', '-', $category->name)]) }}">
                    {{ strtoupper($category->name) }}
                </a>
            @endisset
            @isset($recipe)
                > {{ strtoupper($recipe->recipeTitle) }}
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

    <h2>Preparation steps</h2>
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

    <h2>Rating</h2>
    <ul>
        @foreach($ratings as $rating)
            <li>{{ $rating->rating }} / 5</li>
        @endforeach
    </ul>

@endsection
