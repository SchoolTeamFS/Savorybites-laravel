<?php 
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Rating;

class RatingsTableSeeder extends Seeder
{
    public function run()
    {
        $ratings = [
            ['utilisateur_id' => 3, 'recipe_id' => 1, 'rating' => 4.5],
            ['utilisateur_id' => 3, 'recipe_id' => 18, 'rating' => 4.5],
            ['utilisateur_id' => 4, 'recipe_id' => 18, 'rating' => 4.5],
            ['utilisateur_id' => 5, 'recipe_id' => 18, 'rating' => 3.5],
            ['utilisateur_id' => 3, 'recipe_id' => 15, 'rating' => 2.5],
            ['utilisateur_id' => 5, 'recipe_id' => 15, 'rating' => 4.5],
            ['utilisateur_id' => 4, 'recipe_id' => 2, 'rating' => 4.5],
            ['utilisateur_id' => 3, 'recipe_id' => 2, 'rating' => 4.2],
            ['utilisateur_id' => 4, 'recipe_id' => 1, 'rating' => 3.9],
            ['utilisateur_id' => 5, 'recipe_id' => 3, 'rating' => 3.5],
            // Ajoute d'autres évaluations ici...
        ];

        foreach ($ratings as $rating) {
            Rating::create($rating);
        }
    }
}
