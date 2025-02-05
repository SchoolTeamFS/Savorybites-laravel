<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $categories = [
        ['name' => 'Main Course'],
        ['name' => 'Appetizer'],
        ['name' => 'Dessert'],
        ['name' => 'Salad'],
        ['name' => 'Soup'],
        ['name' => 'Beverage'],
        ['name' => 'Snack']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
