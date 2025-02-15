<x-app-layout>
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
    .comment-form-container h3 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    .comment-form-container form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .comment-form-container textarea {
        width: 50%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: vertical;
        min-height: 100px;
        transition: border-color 0.2s ease;
    }

    .comment-form-container textarea:focus {
        border-color: #B55D51;
        outline: none;
    }

    .comment-form-container button {
        background-color: #B55D51;
        color: #fff;
        border: none;
        width: 20%;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .comment-form-container button:hover {
        background-color: #9a4a3f;
    }
    

.comment-item {
    margin-bottom: 20px;
    padding: 15px;
    background-color: #fff;
    border-radius: 5px;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}

.user-photo {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

.username {
    font-size: 16px;
    color: #B55D51;
}

.comment-text {
    font-size: 14px;
    color: #333;
    margin: 10px 0;
}

.edit-container {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 10px;
}

.edit-input {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}

.stars-container {
    display: flex;
    gap: 5px;
    align-items: center;
}

.button-container {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.save-button,
.cancel-button,
.edit-button,
.delete-button {
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.save-button {
    background-color: #4CAF50;
}

.cancel-button {
    background-color: #ff4d4d;
}

.edit-button {
    background-color: #4CAF50;
}

.delete-button {
    background-color: #ff4d4d;
}

.no-comments {
    text-align: center;
    color: #666;
    font-size: 16px;
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
    <img src="{{ asset($recipe->picture) }}"  alt="{{ $recipe->recipeTitle }}">
    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px; padding: 0 20px;">
    
        <div style="color: #B55D51; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-user"></i>
            <span>{{ $admin->username }}</span>
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

    {{-- <h2>Comments</h2>
    @foreach($comments as $comment)
        <p><strong>{{ $comment->utilisateur->username }}</strong>: {{ $comment->content }}</p>
    @endforeach --}}
    <div class="comment-form-container">
        <h3>Add comment</h3>
        <form action="{{ route('comments.store', $recipe->id) }}" method="POST">
            @csrf
            <textarea name="content" placeholder="Ajouter un commentaire..." rows="4" required></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </div>
    
    <div class="container">
        <h3>Comments :</h3>
        @if($recipe->comments->isEmpty())
            <p class="no-comments">No comment for the moment.</p>
        @else
            @foreach($recipe->comments as $comment)
                <div class="comment-item">
                    <div class="user-info">
                        <span class="username">{{ $comment->utilisateur->username }}</span>-<p class="comment-date">{{ $comment->created_at->format('d-m-Y H:i') }}</p>

                    </div>
                    <p class="comment-text">{{ $comment->content }}</p>
                </div>
            @endforeach
        @endif
    </div>
    
    {{-- <div>
        <h3>Commentaires:</h3>
        @foreach($recipe->comments as $comment)
            <div>
                <p><strong>{{ $comment->utilisateur->username }}</strong>-{{ $comment->created_at->format('d-m-Y H:i') }}</p>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
    </div> --}}

   

@endsection
</x-app-layout>
