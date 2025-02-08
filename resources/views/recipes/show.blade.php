@extends('recipes.app')
@section('content')
    <h1>{{ $recipe->recipeTitle }}</h1>
    <h3>{{$recipe->description}}</h3>
    <img src={{$recipe->picture}}>
    <h4>{{$recipe->created_at}}</h4>
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


