<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'username',
        'image',
        'bio',
        'joined_date',
        'role_id', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function recipe()
    {
        return $this->hasMany(Recipe::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
