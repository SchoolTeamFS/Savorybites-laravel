<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Recipe;


class FavoriteControllerTest extends TestCase
{
   

    // public function testIndex()
    // {
    //     // Retrieve the user with ID 3 from the database
    //     $user = User::find(3);

    //     // Ensure that the user with ID 3 exists in the database
    //     if (!$user) {
    //         $this->fail('User with ID 3 not found in the database.');
    //     }

    //     $this->actingAs($user);


    //     $favorites = Favorite::factory()->count(3)->create([
    //         'utilisateur_id' => $user->id,
    //         'recipe_id' => $recipe->id
    //     ]);

    
    //     $response = $this->get(route('favorites.index'));

    //     $response->assertViewIs('layouts.favorite');

    //     
    //     $response->assertViewHas('favorites', function ($favorites) {
    //         return $favorites->count() === 3;
    //     });

    //     $response->assertViewHas('userFavorites', function ($userFavorites) use ($favorites) {
    //         return $userFavorites === $favorites->pluck('recipe_id')->toArray();
    //     });
    // }
    // public function testAdd()
    // {
       
    //     $user = User::find(3);

    //     if (!$user) {
    //         $this->fail('User with ID 3 not found in the database.');
    //     }

      
    //     $this->actingAs($user);

       

    //     Favorite::create([
    //         'id' => 3,
    //         'utilisateur_id' => 3,
    //         'recipe_id' => 3,
    //     ]);

    //     $response = $this->post(route('favorites.store', ['recipe_id' => $recipe->id]));

        
    //     $this->assertDatabaseHas('favorites', [
    //         'utilisateur_id' => $user->id,
    //         'recipe_id' => $recipe->id,
    //     ]);

        
    // }
    public function testDestroy()
    {
        
        $favorite = Favorite::find(1);

       
        if (!$favorite) {
            $this->fail('Favorite with ID 3 not found in the database.');
        }

    
        $response = $this->delete(route('favorites.destroy', ['favorite' =>$this-> $favorite->id]));

        $this->assertDatabaseMissing('favorites', [
            'id' => 1,
            'utilisateur_id' => $favorite->utilisateur_id,
            'recipe_id' => $favorite->recipe_id,
        ]);

        $response->assertRedirect(route('favorites.index'));
        $response->assertSessionHas('success', 'Favorite deleted successfully.');
    }
}
