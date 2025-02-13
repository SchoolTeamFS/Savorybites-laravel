<?php

namespace Database\Seeders;

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
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => "123456789",
            
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => "123456789",
            
        ]);
    }
}
