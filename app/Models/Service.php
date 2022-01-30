<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public static function generateSlugByTitle(string $title)
    {
        $slugService = \Str::slug($title);
        $totalService = self::withTrashed()->where('slug', 'like', '%' . $slugService . '%')->latest('id')->count();
        if ($totalService > 0) {
            $slugService .= '-'. $totalService;
        }
        return $slugService;
    }
}
