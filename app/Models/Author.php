<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
