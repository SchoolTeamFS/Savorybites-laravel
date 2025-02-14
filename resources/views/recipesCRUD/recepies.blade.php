<!-- Utiliser le layout x-app-layout -->
<x-app-layout>
    <!-- Titre de la page (optionnel, utilisé dans l'en-tête du layout) -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recettes') }}
        </h2>
    </x-slot>

    <!-- Contenu principal -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($recipes as $recipe)
                        <div style="border: 1px solid #ccc; padding: 10px; margin: 10px;">
                            <h2>{{ $recipe->recipeTitle }}</h2>
                            <p>{{ $recipe->description }}</p>
                            <!-- Afficher l'image -->
                            <img src="{{ asset($recipe->picture) }}" alt="{{ $recipe->recipeTitle }}" width="200">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>