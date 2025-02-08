<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $recipe->recipeTitle ?? 'Recette introuvable' }}</title>
</head>
<body>
    <h1>Chemin de la Recette</h1>
    <p>
        <a href="{{ url('/') }}">Accueil</a> > 
        <a href="{{ route('recipes.categ', ['category' => str_replace(' ', '-', $category->name)]) }}">
            {{ $category->name }}
        </a>
        > 
        {{ $recipe->recipeTitle }}
    </p>
</body>
</html>