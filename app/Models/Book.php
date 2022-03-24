<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['author', 'publisher', 'genre'];

    /**
     * Get author relation
     *
     * @return object
     */
    public function author(): object
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get publisher relation
     *
     * @return object
     */
    public function publisher(): object
    {
        return $this->belongsTo(Publisher::class);
    }

    /**
     * Get genre relation
     *
     * @return object
     */
    public function genre(): object
    {
        return $this->belongsTo(Genre::class);
    }
}
