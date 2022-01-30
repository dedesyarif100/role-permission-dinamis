<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    /**
     * Get the user that owns the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the categoryNews that owns the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoryNews()
    {
        return $this->belongsTo(CategoryNews::class, 'category_news_id', 'id');
    }

    public static function generateSlugByTitle(string $title)
    {
        $slugNews = \Str::slug($title);
        $totalNews = self::withTrashed()->where('slug', 'like', '%' . $slugNews . '%')->latest('id')->count();
        if ($totalNews > 0) {
            $slugNews .= '-'. $totalNews;
        }
        return $slugNews;
    }
}
