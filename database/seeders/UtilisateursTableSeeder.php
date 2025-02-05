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
            'username' => 'admin',
            'image' => 'path/to/image.jpg',
            'bio' => 'Administrator of the site',
            'joined_date' => now(),
            'role_id' => 1,
        ]);

        Utilisateur::create([
            'user_id' => 2,
            'username' => 'john_doe',
            'image' => 'path/to/image.jpg',
            'bio' => 'Just a regular user',
            'joined_date' => now(),
            'role_id' => 2,
        ]);
    }
}
