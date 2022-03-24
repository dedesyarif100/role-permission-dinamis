<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function postActivityFeed()
    {
        return $this->morphOne(ActivityFeed::class, 'parentable');
    }

    public function author()
    {
        return $this->hasMany(Author::class);
    }
}
