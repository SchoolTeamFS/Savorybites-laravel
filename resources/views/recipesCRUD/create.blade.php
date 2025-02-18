<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Recipe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="add-recipe-form-container">
                        <h2 class="text-center">Add New Recipe</h2>

                        @if ($errors->any())
                            <div class="error">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Recipe Title -->
                            <label for="recipeTitle" class="block">Recipe Title:</label>
                            <input type="text" id="recipeTitle" name="recipeTitle" class="form-control" required>

                            <!-- Description -->
                            <label for="description" class="block">Description:</label>
                            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>

                            <!-- Category -->
                            <label for="category_id" class="block">Category:</label>
                            <select id="category_id" name="category_id" class="form-control" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <!-- Picture Upload -->
                            <label for="picture" class="block">Picture:</label>
                            <div class=" add-dropzone">
                                <input id="picture" name="picture" type="file" class="form-control" />
                                <p>
                                    Drag & drop an image here, or click to select one
                                </p>
                                @if (old('picture'))
                                    <img src="{{ old('picture') }}" alt="Preview" class="uploaded-image" />
                                @endif
                            </div>

                            <!-- Ingredients -->
                            <label class="block">Ingredients:</label>
                            <div id="ingredients-container">
                                @if (old('ingredients'))
                                    @foreach (old('ingredients') as $index => $ingredient)
                                        <div class="ingredient-row">
                                            <input type="text" name="ingredients[]" class="form-control" value="{{ $ingredient }}" required />
                                            <button type="button" class="btn btn-danger" onclick="removeIngredient({{ $index }})">Remove</button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="ingredient-row">
                                        <input type="text" name="ingredients[]" class="form-control" placeholder="Enter ingredient" required />
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-add" onclick="addIngredient()">Add Ingredient</button>

                            <!-- Preparation Steps -->
                            <label class="block">Preparation Steps:</label>
                            <div id="steps-container">
                                @if (old('preparationSteps'))
                                    @foreach (old('preparationSteps') as $index => $step)
                                        <div class="step-row">
                                            <textarea name="preparationSteps[]" class="form-control">{{ $step }}</textarea>
                                            <button type="button" class="btn btn-danger" onclick="removeStep({{ $index }})">Remove</button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="step-row">
                                        <textarea name="preparationSteps[]" class="form-control" placeholder="Enter preparation step" required></textarea>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-add" onclick="addStep()">Add Step</button>

                            <!-- Submit Button -->
                            <button type="submit" class="btn-submit">Submit Recipe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let ingredientsCount = {{ old('ingredients') ? count(old('ingredients')) : 0 }};
        let stepsCount = {{ old('preparationSteps') ? count(old('preparationSteps')) : 0 }};

        function addIngredient() {
            const container = document.getElementById('ingredients-container');
            const newItem = document.createElement('div');
            newItem.className = 'ingredient-row';
            newItem.innerHTML = `
                <input type="text" name="ingredients[]" class="form-control" placeholder="Enter ingredient" required />
                <button type="button" class="btn btn-danger" onclick="removeIngredient(${ingredientsCount})">Remove</button>
            `;
            container.appendChild(newItem);
            ingredientsCount++;
        }

        function removeIngredient(index) {
            const item = document.querySelector(`#ingredients-container .ingredient-row:nth-child(${index + 1})`);
            if (item) item.remove();
        }

        function addStep() {
            const container = document.getElementById('steps-container');
            const newItem = document.createElement('div');
            newItem.className = 'step-row';
            newItem.innerHTML = `
                <textarea name="preparationSteps[]" class="form-control" placeholder="Enter preparation step" required></textarea>
                <button type="button" class="btn btn-danger" onclick="removeStep(${stepsCount})">Remove</button>
            `;
            container.appendChild(newItem);
            stepsCount++;
        }

        function removeStep(index) {
            const item = document.querySelector(`#steps-container .step-row:nth-child(${index + 1})`);
            if (item) item.remove();
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
.image-preview {
    margin-top: 10px;
  }
  
  .uploaded-image {
    max-width: 100%;
    max-height: 200px;
    border-radius: 8px;
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
.container-btn-danger{
    height: 50px;
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

.add-recipe-form-container .btn-submit {
    background-color: #b66055d9; 
    color: white;
    width: 80%;
    margin-left: 10%;
    padding: 2%;
    margin-top:2%;
}

.add-recipe-form-container .btn-submit:hover {
    background-color: #ba4232d9;
}


.add-recipe-form-container .ingredient-row,
.add-recipe-form-container .step-row,
.add-recipe-form-container .nutrition-row {
    display: flex;
    gap: 10px;
    margin-bottom: 10px;
}

.add-recipe-form-container .ingredient-row input,
.add-recipe-form-container .nutrition-row input {
    flex: 1;
}

.add-recipe-form-container .step-row textarea {
    width: 100%;
    min-height: 60px; 
}

.add-recipe-form-container .step-row .button-group {
    display: flex;
    gap: 10px;
    align-items: center; 
}

.add-recipe-form-container .step-row .btn-danger {
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

.add-recipe-form-container .step-row .btn-danger:hover {
    background-color: #ff5252; 
}

.add-recipe-form-container .step-row .btn-add {
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

.add-recipe-form-container .step-row .btn-add:hover {
    background-color: #52b8a3; 
}

.add-recipe-form-container .ingredient-row .btn-danger {
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

.add-recipe-form-container .ingredient-row .btn-danger:hover {
    background-color: #ff5252; 
}


.add-recipe-form-container .btn-add {
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

.add-recipe-form-container .btn-add:hover {
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
    border: 2px dashed #ccc;
    border-radius: 10px;
    padding: 20px;
    margin-left:5%;
    text-align: center;
    cursor: pointer;
    transition: border-color 0.3s ease, background-color 0.3s ease;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 150px;
    max-width: 90%;
    background-color: #f9f9f9;
}
.add-dropzone:hover,
.add-dropzone.dragover {
    border-color: #0066cc;
    background-color: #eef5ff;
}

.add-dropzone p {
    font-size: 14px;
    color: #666;
    margin-top: 10px;
    font-weight: 500;
}

.add-dropzone input[type="file"] {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
}
    </style>
</x-app-layout>