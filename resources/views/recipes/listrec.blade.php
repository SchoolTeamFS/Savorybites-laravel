<x-app-layout>

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
            <a href="{{ url('/categories') }}">CATEGORIES</a> 
            @isset($category)
                > <a href="{{ route('recipes.categ', ['category' => str_replace(' ', '-', $category->name)]) }}">
                    {{ strtoupper($category->name) }}
                </a>
            @endisset
        </p>
    </nav>

    <h1>categ: {{ strtoupper($categoryName) }}</h1>

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
</x-app-layout>
