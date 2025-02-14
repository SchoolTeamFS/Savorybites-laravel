<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favorite;

class FavoritesTableSeeder extends Seeder
{
    public function run()
    {
        $favorites = [
            ['utilisateur_id' => 3, 'recipe_id' => 1],
            ['utilisateur_id' => 4, 'recipe_id' => 2],
           
        ];

        foreach ($favorites as $favorite) {
            Favorite::create($favorite);
        }
    }
}
