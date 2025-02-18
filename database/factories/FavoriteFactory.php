<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Favorite;

class FavoriteFactory extends Factory
{
    protected $model = Favorite::class;

    public function definition()
    {
        return [
            'utilisateur_id' => 4, 
            'recipe_id' => $this->faker->numberBetween(1, 10), 
        ];
    }
}