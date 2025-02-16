<x-app-layout>
    <div class="card-container">
        @foreach($favorites as $favorite)
            <div class="card-wrapper">
                <a href="{{ route('recipe.show', ['id' => $favorite->recipe->id, 'category' => Str::slug($favorite->recipe->category->name ?? 'no-category'), 'title' => Str::slug($favorite->recipe->recipeTitle)]) }}">
                    <div class="card">
                        <img src="{{ asset($favorite->recipe->picture) }}" alt="{{ $favorite->recipe->recipeTitle }}" class="card-img">
                        <div class="card-content">
                            <h2 class="card-title">{{ $favorite->recipe->recipeTitle }}</h2>
                            
                            <p class="card-rating">
                                @php
                                    $average = $favorite->recipe->averageRating(); // Moyenne des notes
                                    $fullStars = floor($average); // Nombre d'étoiles pleines
                                    $halfStar = ($average - $fullStars) * 100; // Pourcentage de remplissage de l'étoile suivante
                                @endphp

                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $fullStars)
                                        <span class="star filled">★</span> {{-- Étoile pleine --}}
                                    @elseif ($i == $fullStars + 1 && $halfStar > 0)
                                        <span class="star half" style="--percent: {{ $halfStar }}%;">★</span> {{-- Étoile partielle --}}
                                    @else
                                        <span class="star">☆</span> {{-- Étoile vide --}}
                                    @endif
                                @endfor

                                {{ number_format($average, 1) }}/5
                            </p>

                            <div class="card-date-comments">
                                <div>
                                    <span>⏰</span>
                                    <p>{{ $favorite->recipe->created_at ?? 'Date inconnue' }}</p>
                                </div>
                                <div>
                                    <span>💬</span>
                                    <p>{{ $favorite->recipe->comments->count() }}</p>
                                </div>
                            </div>

                           
                            <div>
                            <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette recette des favoris ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn ">Remove from favorites</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <style>
        
        .card-container {
          display: flex;
          flex-wrap: wrap;
          gap: 16px;
          width: 100%;
          justify-content: center;
          padding-bottom: 8%;
      
         
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
        .card-rating {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .star {
            font-size: 24px;
            color: #ccc;
            display: inline-block;
            position: relative;
        }

        .filled {
            color: gold; 
        }

        .half {
            position: relative;
            display: inline-block;
            color: #ccc; 
        }

        .half::before {
            content: '★';
            position: absolute;
            left: 0;
            width: var(--percent, 50%); 
            overflow: hidden;
            color: gold;
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
        
        .delete-btn {
            background-color: #e74c3c; 
            color: white;
            padding: 12px;
            text-align: center;
            border: none;
            border-radius: 0 0 8px 8px;
            width: 100%; 
            cursor: pointer;
            font-size: 16px;
            margin-top: auto; 
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #c0392b;
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
