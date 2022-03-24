<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuNews extends Model
{
    use HasFactory;

    public function menuNews()
    {
        return $this->morphTo(__FUNCTION__, 'menunews_type', 'menunews_id');
    }
}
