<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreparationStep extends Model
{
    use HasFactory;
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
