<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        $comments = [
            ['utilisateur_id' => 3, 'recipe_id' => 1, 'content' => 'Great recipe!'],
            ['utilisateur_id' => 4, 'recipe_id' => 1, 'content' => 'so delecious!'],
           
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}
