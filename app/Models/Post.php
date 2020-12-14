<?php
// This model was made with:
// php artisan make:model Post -m -f
// This also created a migration and factory, this is the way to
// create tables on our DB
// We can add and modify field on the migration file
// DONT FORGET TO RUN migrate after changes on the Terminal

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'body'
    ];
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function likes()
    {
      return $this->hasMany(Like::class);
    }
    public function dislikes()
    {
      return $this->hasMany(Dislike::class);
    }
    // "contains" is a Laravel method for searching collections, return boolean
    public function likedby(User $user)
    {
      return $this->likes->contains('user_id', $user->id);
    }
    public function dislikedby(User $user)
    {
      return $this->dislikes->contains('user_id', $user->id);
    }
}
