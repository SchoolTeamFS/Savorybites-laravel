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
