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
            [
                'name' => 'Main Course',
                'image' => 'images/categimage/maincourse.jpg'
            ],
            [
                'name' => 'Appetizer',
                'image' => 'images/categimage/app.jpg'
            ],
            [
                'name' => 'Dessert',
                'image' => 'images/categimage/dessert.jpg'
            ],
            [
                'name' => 'Salad',
                'image' => 'images/categimage/salade.jpg'
            ],
            [
                'name' => 'Soup',
                'image' => 'images/categimage/soupe.jpg'
            ],
           
            [
                'name' => 'Snack',
                'image' => 'images/categimage/snack.jpg'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}