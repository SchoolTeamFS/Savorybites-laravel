<x-app-layout>
    <div style="margin: 2%;">
        <h1>Recettes disponibles</h1>

        @if($allRecipes->count() > 0)
            <div class="card-container">
                @foreach($allRecipes as $recipe)
                    <div class="card-wrapper">
                    <a href="{{ route('recipe.show', ['id' => $recipe->id,'category' => Str::slug($recipe->category->name), 'title' => Str::slug($recipe->recipeTitle)]) }}" >
                            <div class="card">
                                <img src="{{ asset($recipe->picture) }}" alt="{{ $recipe->recipeTitle }}" class="card-img">
                                <div class="card-content">
                                    <h2 class="card-title">{{ $recipe->recipeTitle }}</h2>
                                    
                                   
                                     <p class="card-rating">
                                        @php
                                            $average = $recipe->averageRating(); // Récupère la moyenne des notes
                                        @endphp

                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="star {{ $i <= $average ? 'filled' : '' }}">☆</span>
                                        @endfor

                                        
                                        {{ method_exists($recipe, 'averageRating') ? number_format($average, 1) : 'N/A' }}/5
                                    </p>

                                    <div class="card-date-comments">
                                        <div>
                                            <span>⏰</span>
                                            <p>{{ $recipe->date ?? 'Date inconnue' }}</p>
                                        </div>
                                        <div>
                                            <span>💬</span>
                                            <p>{{ $recipe->comments->count() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p>Aucune recette disponible.</p>
        @endif

    </div>
    <style>
        
  .card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    width: 100%;
    justify-content: center;
    

   
  }
  .center-container{
    margin-left: 5%;
  }
  .plain-link {
    text-decoration: none; 
    color: inherit; 
  }

  .plain-link:hover, .plain-link:focus {
    text-decoration: none; 
    color: inherit; 
  }
  .card-wrapper {
    flex: 1 1 calc(25% - 16px);
    max-width: calc(25% - 16px); 
    box-sizing: border-box;

  }
  .star {
    font-size: 20px;
    color: #ddd; /* Couleur des étoiles vides */
    }

    .star.filled {
        color: #ffd700; /* Couleur dorée pour les étoiles pleines */
    }

  .card {
    border: 1px solid #ccc;
    border-radius: 8px;
    width: 250px;
    background-color:  white;
    display: flex;
    flex-direction: column; 
    overflow: hidden; 
    /* height:350px; */
    opacity: 1;
    transform: translateY(50px); 
     transition: opacity 0.6s ease-out, transform 0.6s ease-out;
  }
  
  .card.show {
    opacity: 0;
   transform: translateY(0); 
  }
  
  .card img {
    width: 100%; 
    height: 200px;
    object-fit: cover; 
    margin: 0;
  }
  
  .card-content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  
    box-sizing: border-box; 
  }
  
  .card-title {
    font-size: 18px;
  }
  
  .card-rating {
    display: flex;
    align-items: center;
  }
  
  .card-rating span {
    margin-right: 4px;
  }
  
  .card-date-comments {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 2%;
  }
  
  .card-date-comments div {
    display: flex;
    align-items: center;
  }
  
  .card-date-comments span {
    color: #757575;
  }
  
  .card-date-comments p {
    margin: 0; 
    color: #757575;
    font-size: 14px;
  }
 
  
  .favorite-card {
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
  }
  

  
  .favorite-card button {
    width: 100%;
    margin-top: 10px;
  }
@media (max-width: 619px) {
    .card-container {
        gap: 8px;
        justify-content: center;
    }

    .card-wrapper {
        flex: 0 0 auto;
        max-width: 250px;
    }

    .card {
        width: 250px;
        margin-bottom: 8px;
    }

    .card img {
        height: 150px;
    }

    .card-title {
        font-size: 16px;
    }

    .card-date-comments p {
        font-size: 12px;
    }
}


@media (min-width: 620px) and (max-width: 899px) {
    .card-container {
        gap: 16px;
        justify-content: flex-start;
    }

    .card-wrapper {
        flex: 1 1 calc(50% - 16px); 
        max-width: calc(50% - 16px);
    }
}

@media (min-width: 900px) and (max-width: 1199px) {
    .card-wrapper {
        flex: 1 1 calc(33.33% - 16px);
        max-width: calc(33.33% - 16px);
    }
}

@media (min-width: 1200px) {
    .card-wrapper {
        flex: 1 1 calc(25% - 16px); 
        max-width: calc(25% - 16px);
    }
}
    </style>
    
</x-app-layout>
