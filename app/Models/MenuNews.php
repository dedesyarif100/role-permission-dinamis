<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuNews extends Model
{
    use HasFactory, SoftDeletes;

    public function menuNews()
    {
        return $this->morphTo(__FUNCTION__, 'menunews_type', 'menunews_id');
    }
}
