<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryNews extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public static function generateSlugByTitle(string $title)
    {
        $slugCategoryNews = \Str::slug($title);
        $totalCategoryNews = self::withTrashed()->where('slug', 'like', '%' . $slugCategoryNews . '%')->latest('id')->count();
        if ($totalCategoryNews > 0) {
            $slugCategoryNews .= '-'. $totalCategoryNews;
        }
        return $slugCategoryNews;
    }
}
