<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Alice Robert',
            'email' => 'aliceadmin@example.com',
            'password' => Hash::make('1234567890'),
            
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'johndoeadmin@example.com',
            'password' =>Hash::make('1234567890'),
            
        ]);
        User::create([
            'name' => 'Jean Smith',
            'email' => 'jeansmithuser@example.com',
            'password' => Hash::make('1234567890'),
            
        ]);
        User::create([
            'name' => 'Bella Haddid',
            'email' => 'bellahaddiduser@example.com',
            'password' => Hash::make('1234567890'),
            
        ]);
        User::create([
            'name' => 'Alen Jho',
            'email' => 'alenjhouser@example.com',
            'password' => Hash::make('1234567890'),
            
        ]);
    }
}
