
<x-app-layout>
@extends('recipes.appstyle')
@section('content')
    <nav>
        <p>
            <a href="/" style="text-transform:uppercase">Categories</a> 
            @isset($category)
                > <a href="{{ route('recipes.categ', ['category' => str_replace(' ', '-', $category->name)]) }}" style="text-transform:uppercase">
                    {{ $category->name }}
                </a>
            @endisset >
            @isset($recipe)
                <span style="text-transform: uppercase;font-style: italic">{{ $recipe->recipeTitle }}</span>
            @endisset
        </p>
    </nav>
    <h3 style="font-size:2em; font-style: italic; font-weight: bolder;">{{ $recipe->description }}</h3>
    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 10px; padding: 0 20px;">
    
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
            $note = $recipe->ratings->avg('rating'); 
            $note = $note ?? 0;
            $entier = floor($note); 
            $decimal = $note - $entier; 
            $starColor = $note > 0 ? '#B55D51' : ''; 
        @endphp

        <div class="flex items-center">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $entier)
                    <i class="fas fa-star" style="color: {{ $starColor }}; font-size: 1.2em;"></i> 
                @elseif ($i == $entier + 1 && $decimal > 0)
                    <i class="fas fa-star-half-alt" style="color: {{ $starColor }}; font-size: 1.2em;"></i> 
                @else
                    <i class="far fa-star text-gray-400"></i> 
                @endif
            @endfor
        </div>
        <!-- @if (auth()->check() && (auth()->id() === $recipe->user_id || auth()->user()->utilisateur->role->name === 'Admin'))
        <a href="{{ route('recipes.edit', $recipe->id) }}">Update Recipe</a>

        @endif -->
        @if (auth()->check() && (auth()->id() === $recipe->user_id || auth()->user()->utilisateur->role->name === 'Admin'))
            <a href="{{ route('recipes.edit', $recipe->id) }}"       style="background-color: green; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;"> Update Recipe</a>

            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background-color: #DC143C; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Delete Recipe</button>
            </form>
        @endif


        @if(auth()->user()->utilisateur && auth()->user()->utilisateur->role_id == 2)

        {{----------------------- BTN_FAV -------------------}}
        <form id="favorite-form-{{ $recipe->id }}" action="{{ route('favorites.store') }}" method="POST">
            @csrf
            <button type="button" class="favorite-btn inline-flex items-center gap-2 px-4 py-2 border rounded text-[#B55D51] bg-transparent border-[#B55D51]"
                    data-recipe-id="{{ $recipe->id }}"
                    data-is-saved="{{ in_array($recipe->id, $userFavorites ?? []) ? 'true' : 'false' }}">
                @if (in_array($recipe->id, $userFavorites ?? []))
                  
                    <i class="fas fa-heart" style="color: #B55D51;"></i> Saved
                @else

                    <i class="far fa-heart"></i> Save
                @endif
            </button>
        </form>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
        
            document.querySelectorAll('.favorite-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const recipeId = this.dataset.recipeId; 
                    const form = this.closest('form'); 
                    const isSaved = this.dataset.isSaved === 'true';

                    fetch(form.action, {
                        method: isSaved ? 'DELETE' : 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ recipe_id: recipeId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
        
                            if (isSaved) {
                            
                                this.innerHTML = '<i class="far fa-heart"></i> Save';
                                this.dataset.isSaved = 'false';
                            } else {
                    
                                this.innerHTML = '<i class="fas fa-heart" style="color: #B55D51;"></i> Saved';
                                this.dataset.isSaved = 'true';
                                }
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    });
                });
            });
        </script>
        @endif
        {{-------------------------------------------------}}
    </div>
    <div class="ing-img">
        <div class="left-side">
            <img src="{{ asset($recipe->picture) }}" class="recipeimg" alt="{{ $recipe->recipeTitle }}">
            <div class="instructions-container">
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
        </div>
    
        <div class="right-side">
            <div class="ingredients-container">
                <h2>Ingredients</h2>
                @foreach($ingredients as $ingredient)
                    <div class="ingredient-item">
                        <input type="checkbox">
                        <span>{{ $ingredient->ingredient }}</span>
                    </div>
                @endforeach
            </div>
            
            <div class="related-recipes">
                <h2>Related recipes</h2>
                <div class="recipes-list">
                    @foreach ($relatedRecipes as $related)
                        <div class="recipe-item">
                            <a href="{{ route('recipe.show', ['category' => $category->name, 'title' => str_replace(' ', '-', $related->recipeTitle)]) }}">
                                <img src="{{ asset($related->picture) }}" class="related_img" alt="{{ $related->recipeTitle }}">
                                <h4>{{ $related->recipeTitle }}</h4>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="comment-form-container" style="width: 50%">
        <h3>Comments</h3>
        <form action="{{ route('comments.store', $recipe->id) }}" method="POST">
            @csrf
            <textarea name="content" placeholder="Ajouter un commentaire..." rows="4" ></textarea>
            <label for="rating">Add raiting</label>
            <input type="number" id="rating" name="rating" min="1" max="5" step="0.1" value="1" >
            <button type="submit">Envoyer</button>
        </form>
    </div>
    <div class="container" >    
        @if($recipe->comments->isEmpty())
            <p class="no-comments">No comment for the moment.</p>
        @else
        @foreach($recipe->comments->sortByDesc('created_at') as $comment)                
            <div class="comment-item">
                    <div class="comment-content">
                        <div class="user-info">
                            <div class="user-photo-container">
                                @if ($comment->utilisateur && $comment->utilisateur->image)
                                    <img class="user-photo" src="{{ asset($comment->utilisateur->image) }}" alt="Image de l'utilisateur">
                                @else
                                    <img class="user-photo" src="https://th.bing.com/th/id/OIP.hGSCbXlcOjL_9mmzerqAbQHaHa?rs=1&pid=ImgDetMain" alt="Image par défaut">
                                @endif
                            </div>
                            <div class="user-details">
                                <span class="username">{{ $comment->utilisateur->username }}</span> 
                                <p class="comment-date">{{ $comment->created_at->format('d-m-Y H:i') }}</p>
                                <div class="rating">
                                    @php
                                        $rating = $recipe->ratings->where('utilisateur_id', $comment->utilisateur->id)->first();
                                        $ratingValue = $rating ? $rating->rating : 0; 
                                        $fullStars = floor($ratingValue);  
                                        $halfStar = ($ratingValue - $fullStars) >= 0.5 ? true : false; 
                                        $emptyStars = 5 - ceil($ratingValue); 
                                    @endphp
                                    @for ($i = 1; $i <= $fullStars; $i++)
                                        <i class="fas fa-star" style="color: #B55D51;"></i>
                                    @endfor
                                    @if ($halfStar)
                                        <i class="fas fa-star-half-alt" style="color: #B55D51;"></i>
                                    @endif    
                                    @for ($i = 1; $i <= $emptyStars; $i++)
                                        <i class="far fa-star" style="color: #B55D51;"></i>
                                    @endfor
                                </div>
                            </div>
                            
                        </div>
                        <p class="comment-text">{{ $comment->content }}</p>
                        
    
                        @if ($comment->utilisateur_id === auth()->id())
                        <div style="display: flex">
                            <form action="{{ route('comments.update', $comment->id) }}" method="POST" class="edit-form">
                                @csrf
                                @method('PUT')
                                <textarea name="content" rows="2">{{ $comment->content }}</textarea>
                                <input style=" width: 50%;height: 50px;border: 1px solid #ddd; border-radius: 5px;" type="number" name="rating" min="1" max="5" step="0.1"  value="{{ $rating ? $rating->rating : 1 }}">
                                <button type="submit" class="btn-edit">Update</button>
                            </form>
                            
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </div>
                    
                    @elseif(auth()->user()->utilisateur && auth()->user()->utilisateur->role && auth()->user()->utilisateur->role->name === 'Admin')
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    @endif
                    
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
</x-app-layout>
