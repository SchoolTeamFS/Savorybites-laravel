<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes de la catégorie {{ $category->name }}</title>
</head>
<body>
    <h1>Recettes de la catégorie {{ $category->name }}</h1>
    <ul>
        @foreach($recipes as $recipe)
            <li><a href="{{ route('recipes.show', $recipe->id) }}">{{ $recipe->recipeTitle }}</a></li>
        @endforeach
    </ul>
</body>
</html>
