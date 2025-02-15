<x-app-layout>
    @section('content')
    <div class="carousel-container">
        <div class="carousel">
            @foreach ($topRecipes as $index => $recipe)
                <a href="{{ route('recipe.show', ['category' => Str::slug($recipe->category->name), 'title' => Str::slug($recipe->recipeTitle)]) }}" 
                    class="carousel-item" data-index="{{ $index }}">
                    <img src="{{ asset($recipe->picture) }}" alt="{{ $recipe->recipeTitle }}">
                    <h3 class="carousel-title">{{ $recipe->recipeTitle }}</h3>
                </a>
            @endforeach
        </div>
    </div>
    <div style="display: flex; margin-top: 20px; justify-content: space-around; flex-wrap: wrap;">
        @foreach ($categories as $name => $image)
            <a href="{{ route('recipes.categ', ['category' => Str::slug($name)]) }}" style="text-decoration: none; color: inherit;">
                <div style="text-align: center; margin: 30px;">
                    <img src="{{ asset($image) }}" alt="{{ $name }}" style="width: 120px; height: 120px; border-radius: 50%;" />
                    <h2 style="font-family: initial;">{{ $name }}</h2>
                </div>
            </a>
        @endforeach
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
            width: 90%;
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
    </style>
    @endsection
</x-app-layout>
