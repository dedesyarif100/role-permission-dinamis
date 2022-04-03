<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory, SoftDeletes;

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
