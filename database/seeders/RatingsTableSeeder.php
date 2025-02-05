<?php 
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Rating;

class RatingsTableSeeder extends Seeder
{
    public function run()
    {
        $ratings = [
            ['utilisateur_id' => 2, 'recipe_id' => 1, 'rating' => 4.5],
           
            // Ajoute d'autres évaluations ici...
        ];

        foreach ($ratings as $rating) {
            Rating::create($rating);
        }
    }
}
