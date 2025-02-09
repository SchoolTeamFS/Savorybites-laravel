@extends('recipes.app')

@section('content')

    <style>
        .ingredients-container {
            background-color: #f9f9f9;
            color: black;
            width: 30%;
            text-align: left;
            border-radius: 5px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .ingredient-item {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .ingredient-item:last-child {
            border-bottom: none;
        }

        .ingredient-item input[type="checkbox"] {
            margin-right: 15px;
            transform: scale(1.2);
        }

        .ingredient-item input[type="checkbox"]:checked + span {
            text-decoration: line-through;
            color: gray;
        }

        h2 {
            margin-bottom: 10px;
            width: 100%;
        }
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
            <a href="{{ url('/categories') }}">Catégories</a> 
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
    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px; padding: 0 20px;">
    
        <div style="color: #B55D51; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-user"></i>
            <span>{{ $recipe->author }}</span>
        </div>
    
        <div style="color: #B55D51; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-calendar-alt"></i>
            <span>{{ $recipe->created_at->format('d M Y') }}</span>
        </div>
    
        <div style="color: #B55D51; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-comments"></i>
            <span>{{ count($recipe->comments) }} Comments</span>
        </div>
    
        @php
            $averageRating = $recipe->ratings->avg('rating') ?? 0; 
            $fullStars = floor($averageRating);
            $hasHalfStar = ($averageRating - $fullStars) >= 0.5;
            $emptyStars = 5 - ceil($averageRating);
        @endphp

        <div style="display: flex; align-items: center; gap: 5px;">
            @for ($i = 0; $i < $fullStars; $i++)
                <i class="fas fa-star" style="color: #B55D51; font-size: 1.2em;"></i>
            @endfor

            @if ($hasHalfStar)
                <span style="position: relative; display: inline-block;">
                    <i class="fas fa-star" style="color: #ccc; font-size: 1.2em;"></i>
                    <span style="position: absolute; top: 0; left: 0; width: 50%; overflow: hidden;">
                        <i class="fas fa-star" style="color: #B55D51; font-size: 1.2em;"></i>
                    </span>
                </span>
            @endif

            @for ($i = 0; $i < $emptyStars; $i++)
                <i class="fas fa-star" style="color: #ccc; font-size: 1.2em;"></i>
            @endfor
        </div>
    </div>
    
    <div class="ingredients-container">
        <h2>Ingrédients</h2>
        @foreach($ingredients as $ingredient)
            <div class="ingredient-item">
                <input type="checkbox">
                <span>{{ $ingredient->ingredient }}</span>
            </div>
        @endforeach
    </div>

    <div style="margin-left: 40px;">
        <h2>Instructions</h2>
        <div style="display: flex; flex-direction: row; justify-content: space-between;">            
            <ol>
                @foreach($preparationSteps as $index => $step)
                    <li style="margin-bottom: 10px; display: flex; align-items: center;">
                        <div style="
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            width: 20px;
                            height: 20px;
                            border: 2px solid #B55D51;
                            border-radius: 4px;
                            margin-right: 10px;
                            font-size: 12px;
                            font-weight: bold;
                            color: #fff;
                            background-color: #B55D51;">
                            {{ $index + 1 }}
                        </div>
                        <span>{{ $step->step }}</span>
                    </li>
                @endforeach
            </ol>
            
        </div>
    </div>

    <h2>Comments</h2>
    @foreach($comments as $comment)
        <p><strong>{{ $comment->utilisateur->username }}</strong>: {{ $comment->content }}</p>
    @endforeach

    <h2>Raiting</h2>
    @foreach($ratings as $rating)
        <p>{{ $rating->rating }} / 5</p>
    @endforeach

@endsection
