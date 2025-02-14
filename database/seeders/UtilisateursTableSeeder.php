<?php

namespace Database\Seeders;
use App\Models\Utilisateur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UtilisateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Utilisateur::create([
            'user_id' => 1,
            'username' => 'alice_robert',
            'image' => 'images/UserImages/user3.jpg',
            'bio' => 'Administrator of the site',
            'joined_date' => now(),
            'role_id' => 1,
        ]);

        Utilisateur::create([
            'user_id' => 2,
            'username' => 'john_doe',
            'image' => 'images/UserImages/user1.jpg',
            'bio' => 'Administrator of the site',
            'joined_date' => now(),
            'role_id' => 1,
        ]);
        
        Utilisateur::create([
            'user_id' => 3,
            'username' => 'jean_smith',
            'image' => 'images/UserImages/user2.jpg',
            'bio' => 'Just a normal user',
            'joined_date' => now(),
            'role_id' => 2,
        ]);
        Utilisateur::create([
            'user_id' => 4,
            'username' => 'bella_haddid',
            'image' => 'images/UserImages/user5.jpg',
            'bio' => 'Just a normal user',
            'joined_date' => now(),
            'role_id' => 2,
        ]);
        Utilisateur::create([
            'user_id' => 5,
            'username' => 'alen_jho',
            'image' => 'images/UserImages/user4.jpg',
            'bio' => 'Just a normal user',
            'joined_date' => now(),
            'role_id' => 2,
        ]);
    }
}
