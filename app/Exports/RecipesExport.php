<?php

namespace App\Exports;

use App\Models\Recipe;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RecipesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Recipe::select('recipeTitle', 'description', 'category_id', 'picture', 'created_at', 'updated_at', 'utilisateur_id')->get();
    }

    public function headings(): array
    {
        return ['Recipe Title', 'Description', 'Category ID', 'Picture', 'Created At', 'Updated At', 'Utilisateur ID'];
    }
}
