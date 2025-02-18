<x-app-layout>
    @section('content')
    
    <div class="carousel-container">
        <div class="carousel">
            @foreach ($topRecipes as $index => $recipe)
                <a href="{{ route('recipe.show', ['category' => Str::slug($recipe->category->name), 'title' => Str::slug($recipe->recipeTitle)]) }}" 
                    class="carousel-item" data-index="{{ $index }}">
                    <img src="{{ asset($recipe->picture) }}" alt="{{ $recipe->recipeTitle }}">
                </a>
            @endforeach
        </div>
    </div>
    <div style="display: flex; margin-top: 20px; justify-content: space-between; flex-wrap: wrap;">
        <h2 style="font-family: serif; font-size: 2rem; margin-bottom: 40px; font-weight: bolder; width: 100%; text-align: left;">Popular Categories</h2>
        @foreach ($categories as $name => $image)
            <a href="{{ route('recipes.categ', ['category' => Str::slug($name)]) }}" style="text-decoration: none; color: inherit;">
                <div style="text-align: center; margin: 20px; width: 180px;">
                    <img src="{{ asset($image) }}" alt="{{ $name }}" style="width: 120px; height: 120px; border-radius: 50%;" />
                    <h2 style="font-family: initial; margin-top: 15px; font-size: 1.2rem; font-weight: bold;">{{ $name }}</h2>
                </div>
            </a>
        @endforeach
    </div>
    
    <div class="latest-recipes">
        <h2>Latest Recipes</h2>
        <div class="recipes-grid">
            @foreach ($latestRecipes as $recipe)
            <a href="{{ route('recipe.show', ['category' => Str::slug($recipe->category->name), 'title' => Str::slug($recipe->recipeTitle)]) }}" >
                <div class="latest-recipe-item">
                        <img src="{{ asset($recipe->picture) }}" alt="{{ $recipe->recipeTitle }}">
                        <h3>{{ $recipe->recipeTitle }}</h3>
                    </div>
                </a>
                
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const slides = document.querySelectorAll(".carousel-item");
            let currentIndex = 0;
            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.style.opacity = i === index ? "1" : "0";
                    slide.style.pointerEvents = i === index ? "auto" : "none";
                });
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                showSlide(currentIndex);
            }

            setInterval(nextSlide, 2000); 
            showSlide(currentIndex);
        });
    </script>
    <div class="top-recipes12">
        <h2 style="font-family: serif; font-size: 2rem; margin-bottom: 40px; font-weight: bolder; width: 100%; text-align: left;">Top recipes</h2>
        <div class="card-container">
        @foreach($topRecipes12 as $recipe)
        <div class="card-wrapper">
                    <a href="{{ route('recipe.show', ['id' => $recipe->id,'category' => Str::slug($recipe->category->name), 'title' => Str::slug($recipe->recipeTitle)]) }}" >
                            <div class="card">
                                <img src="{{ asset($recipe->picture) }}" alt="{{ $recipe->recipeTitle }}" class="card-img">
                                <div class="card-content">
                                    <h2 class="card-title">{{ $recipe->recipeTitle }}</h2>
                                    
                                   
                                    <p class="card-rating">
                                        @php
                                            $average = $recipe->averageRating(); // Moyenne des notes
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
                                            <p>{{ $recipe->created_at ?? 'Date inconnue' }}</p>
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
        </div >
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
            color: #ccc; /* Étoiles vides */
            display: inline-block;
            position: relative;
        }

        .filled {
            color: gold; /* Étoiles pleines */
        }

        .half {
            position: relative;
            display: inline-block;
            color: #ccc; /* Par défaut, étoile vide */
        }

        .half::before {
            content: '★';
            position: absolute;
            left: 0;
            width: var(--percent, 50%); /* Remplissage dynamique */
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
    </div>

    <style>
        .carousel-container {
            width: 100%;
            margin: auto;
            position: relative;
            overflow: hidden;
            height: 700px;
        }

        .carousel {
            display: flex;
            position: relative;
            width: 100%;
            height: 100%;
        }

        .carousel-item {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            text-decoration: none;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .carousel-title {
            position: absolute;
            bottom: 10%;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 3rem;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
            text-align: center;
        }
       
    
        .latest-recipes h2 {
            font-family: serif; font-size: 2rem; margin-bottom: 50px;font-weight: bolder
        }
    
        .recipes-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            justify-items: center;
        }
    
        .latest-recipe-item {
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease;
            width: 100%;
        }
    
        .latest-recipe-item:hover {
            transform: translateY(-5px);
        }
    
        .latest-recipe-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    
        .latest-recipe-item h3 {
            font-family: Arial, sans-serif;
            margin-bottom: 10px;
            font-weight: bold
        }
    
        .latest-recipe-item p {
            font-size: 1rem;
            color: #666;
        }
    
        @media (max-width: 768px) {
            .recipes-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
    
        @media (max-width: 480px) {
            .recipes-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    @endsection
</x-app-layout>
