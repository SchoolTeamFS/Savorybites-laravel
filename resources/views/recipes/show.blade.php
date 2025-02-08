<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $recipe->recipeTitle }}</title>
</head>
<body>
    <h1>{{ $recipe->recipeTitle }}</h1>
    <h3>{{$recipe->description}}</h3>

    <h2>Ingrédients</h2>
    <ul>
        @foreach($ingredients as $ingredient)
            <li>{{ $ingredient->ingredient }}</li>
        @endforeach
    </ul>

    <h2>Étapes de préparation</h2>
    <ol>
        @foreach($preparationSteps as $step)
            <li>{{ $step->step }}</li>
        @endforeach
    </ol>

    <h2>Commentaires</h2>
    <ul>
        @foreach($comments as $comment)
            <li>{{ $comment->content }} - Par {{ $comment->utilisateur->name }}</li>
        @endforeach
    </ul>

    <h2>Évaluations</h2>
    <ul>
        @foreach($ratings as $rating)
            <li>{{ $rating->rating }} / 5</li>
        @endforeach
    </ul>

</body>
</html>
