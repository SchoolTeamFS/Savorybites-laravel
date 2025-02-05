<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        $comments = [
            ['utilisateur_id' => 2, 'recipe_id' => 1, 'content' => 'Great recipe!'],
            // Ajoute d'autres commentaires ici...
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}
