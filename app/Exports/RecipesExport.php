<?php

namespace App\Exports;

use App\Models\Recipe;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RecipesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Recipe::with(['utilisateur', 'category'])->get()->map(function ($recipe) {
            return [
                'Recipe Title'   => $recipe->recipeTitle,
                'Category'       => $recipe->category->name ?? 'N/A',
                'Description'    => $recipe->description,
                'Picture'        => $recipe->picture ?? 'No Picture',
                'Author'         => $recipe->utilisateur->username ?? 'Unknown',
                'Created At'     => $recipe->created_at->format('Y-m-d H:i:s'),
                'Updated At'     => $recipe->updated_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    public function headings(): array
    {
        return ['Recipe Title', 'Category', 'Description', 'Picture', 'Author', 'Created At', 'Updated At'];
    }
}
