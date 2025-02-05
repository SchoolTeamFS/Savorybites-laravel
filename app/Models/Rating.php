<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
