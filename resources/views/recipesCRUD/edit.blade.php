<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Recipe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="add-recipe-form-container">
                        <h2 class="text-center">Edit Recipe</h2>

                        @if ($errors->any())
                            <div class="error">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <!-- Recipe Title -->
                            <label for="recipeTitle" class="block">Recipe Title:</label>
                            <input type="text" id="recipeTitle" name="recipeTitle" class="form-control" value="{{ $recipe->recipeTitle }}" required>

                            <!-- Description -->
                            <label for="description" class="block">Description:</label>
                            <textarea id="description" name="description" class="form-control" rows="4" required>{{ $recipe->description }}</textarea>

                            <!-- Category -->
                            <label for="category_id" class="block">Category:</label>
                            <select id="category_id" name="category_id" class="form-control" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $recipe->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <label for="picture" class="block">Picture:</label>
                            <div class="add-dropzone">
                                <input id="picture" name="picture" type="file" class="form-control" />
                                <p>
                                    Drag & drop an image here, or click to select one
                                </p>

                                <!-- Show the preview of the image if it's uploaded -->
                                @if (old('picture'))
                                    <img src="{{ old('picture') }}" alt="Preview" class="add-uploaded-image" />
                                @elseif ($recipe->picture)
                                    <img src="{{ asset('storage/' . $recipe->picture) }}" alt="Preview" class="add-uploaded-image" />
                                @endif
                            </div>

                            <!-- Ingredients -->
                            <label class="block">Ingredients:</label>
                            <div id="ingredients-container">
                                @foreach ($ingredients as $index => $ingredient)
                                    <div class="add-ingredient-row">
                                        <input type="text" name="ingredients[]" class="form-control" value="{{ $ingredient }}" required />
                                        <button type="button" class="btn btn-danger" onclick="removeIngredient(this)">Remove</button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-add" onclick="addIngredient()">Add Ingredient</button>

                            <!-- Preparation Steps -->
                            <label class="block">Preparation Steps:</label>
                            <div id="steps-container">
                                @foreach ($preparationSteps as $index => $step)
                                    <div class="add-step-row">
                                        <textarea name="preparationSteps[]" class="form-control">{{ $step }}</textarea>
                                        <button type="button" class="btn btn-danger" onclick="removeStep(this)">Remove</button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-add" onclick="addStep()">Add Step</button>

                            <!-- Submit Button -->
                            <button type="submit" class="add-btn-submit">Update Recipe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add Ingredient dynamically
        function addIngredient() {
            const container = document.getElementById('ingredients-container');
            const newIngredientRow = document.createElement('div');
            newIngredientRow.classList.add('add-ingredient-row');
            newIngredientRow.innerHTML = `
                <input type="text" name="ingredients[]" class="form-control" required />
                <button type="button" class="btn btn-danger" onclick="removeIngredient(this)">Remove</button>
            `;
            container.appendChild(newIngredientRow);
        }

        // Remove Ingredient dynamically
        function removeIngredient(button) {
            button.closest('.add-ingredient-row').remove();
        }

        // Add Preparation Step dynamically
        function addStep() {
            const container = document.getElementById('steps-container');
            const newStepRow = document.createElement('div');
            newStepRow.classList.add('add-step-row');
            newStepRow.innerHTML = `
                <textarea name="preparationSteps[]" class="form-control" rows="4" required></textarea>
                <button type="button" class="btn btn-danger" onclick="removeStep(this)">Remove</button>
            `;
            container.appendChild(newStepRow);
        }

        // Remove Preparation Step dynamically
        function removeStep(button) {
            button.closest('.add-step-row').remove();
        }
    </script>

    <style>
        .add-recipe-form-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .add-recipe-form-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 500;
        }
        
        .add-recipe-form-container input[type="file"] {
            width: 90%; 
            padding: 10px; 
            margin-left: 5%; 
            margin-bottom: 5%; 
            border: 1px solid #ccc; 
            border-radius: 4px;
            font-size: 1rem;
            box-sizing: border-box; 
            transition: border-color 0.3s; 
            background-color: white; 
            cursor: pointer; 
        }
        
        .add-recipe-form-container input[type="file"]:focus {
            border-color: #888;
            outline: none; 
        }
        
        .add-recipe-form-container label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 14px;
            font-weight: 500;
        }
        
        .add-recipe-form-container input[type="text"],
        .add-recipe-form-container input[type="number"],
        .add-recipe-form-container input[type="email"],
        .add-recipe-form-container select,
        .add-recipe-form-container textarea {
            width: 90%;
            padding: 10px;
            margin-left: 5%;
            margin-bottom: 5%;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        
        .add-recipe-form-container input:focus,
        .add-recipe-form-container select:focus,
        .add-recipe-form-container textarea:focus {
            border-color: #888;
            outline: none;
        }
        
        .add-recipe-form-container textarea {
            resize: vertical;
            min-height: 60px; 
        }

        .add-recipe-form-container button {
            padding: 5px 10px; 
            font-size: 0.8rem; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center; 
        }

        .add-recipe-form-container .btn-danger {
            background-color: #ff6b6b; 
            color: white;
            padding: 2%;
        }

        .add-recipe-form-container .btn-danger:hover {
            background-color: #ff5252; 
        }

        .add-recipe-form-container .btn-add {
            background-color: #6bccb9;
            color: white;
        }

        .add-recipe-form-container .btn-add:hover {
            background-color: #52b8a3; 
        }

        .add-recipe-form-container .add-btn-submit {
            background-color: #b66055d9; 
            color: white;
            width: 80%;
            margin-left: 10%;
            padding: 2%;
            margin-top:2%;
        }

        .add-recipe-form-container .add-btn-submit:hover {
            background-color: #ba4232d9;
        }

        .add-recipe-form-container .add-ingredient-row,
        .add-recipe-form-container .add-step-row,
        .add-recipe-form-container .add-nutrition-row {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .add-recipe-form-container .add-ingredient-row input,
        .add-recipe-form-container .add-nutrition-row input {
            flex: 1;
        }

        .add-recipe-form-container .add-step-row textarea {
            width: 100%;
            min-height: 60px; 
        }

        .add-recipe-form-container .add-step-row .button-group {
            display: flex;
            gap: 10px;
            align-items: center; 
        }

        .add-recipe-form-container .add-step-row .btn-danger {
            background-color: #ff6b6b;
            color: white;
            padding: 5px 10px; 
            font-size: 0.8rem; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center; 
        }

        .add-recipe-form-container .add-step-row .btn-danger:hover {
            background-color: #ff5252; 
        }

        .add-recipe-form-container .add-step-row .btn-add {
            background-color: #6bccb9;
            color: white;
            padding: 5px 10px; 
            font-size: 0.8rem; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center; 
        }

        .add-recipe-form-container .add-step-row .btn-add:hover {
            background-color: #52b8a3; 
        }

        .add-recipe-form-container .add-ingredient-row .btn-danger {
            background-color: #ff6b6b; 
            color: white;
            padding: 5px 10px; 
            font-size: 0.8rem; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
        }

        .add-recipe-form-container .add-ingredient-row .btn-danger:hover {
            background-color: #ff5252; 
        }

        .add-recipe-form-container .add-btn-add {
            background-color: #6bccb9; 
            color: white;
            padding: 2%;
            font-size: 0.8rem;
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center; 
        }

        .add-recipe-form-container .add-btn-add:hover {
            background-color: #328c57;
        }

        @media (max-width: 768px) {
            .add-recipe-form-container {
                padding: 15px;
            }

            .add-recipe-form-container input,
            .add-recipe-form-container textarea {
                font-size: 0.9rem;
            }

            .add-recipe-form-container button {
                font-size: 1rem;
            }
        }

        .add-dropzone {
            width: 90%; 
            margin-left: 5%; 
            margin-bottom: 5%; 
            padding: 20px; 
            border: 2px dashed #ccc; 
            border-radius: 8px;
            background-color: #f9f9f9;
            text-align: center;
            cursor: pointer; 
            transition: border-color 0.3s, background-color 0.3s; 
        }

        .add-dropzone:hover,
        .add-dropzone:focus {
            border-color: #888; 
            background-color: #f0f0f0;
        }

        .add-dropzone.dragover {
            border-color: #6bccb9; 
            background-color: #e0f7f0;
        }

        .add-uploaded-image {
            max-width: 100%; 
            height: auto;
            margin-top: 10px;
        }
    </style>
</x-app-layout>
