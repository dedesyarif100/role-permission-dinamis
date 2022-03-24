<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public function tags()
    {
        dd('cek');
        return $this->hasMany(Tag::class);
    }

    public function photoActivityFeed()
    {
        return $this->morphOne(ActivityFeed::class, 'parentable');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
