<x-app-layout>
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
        <a href="{{ url('/') }}">Categories</a> 
        @isset($category)
            > <a href="{{ route('recipes.categ', ['category' => str_replace(' ', '-', $category->name)]) }}">
                {{ $category->name }}
            </a>
        @endisset

    </p>
</nav>

    <ul>
        @foreach($recipes as $recipe)
            <li>
                <a href="{{ route('recipe.show', ['category' => Str::slug($categoryName), 'title' => Str::slug($recipe->recipeTitle)]) }}">
                    {{ $recipe->recipeTitle }}
                </a>
            </li>
        @endforeach
    </ul>
</x-app-layout>