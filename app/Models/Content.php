<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'content';
    protected $guarded = ['id'];
    /**
     * Get the menu that owns the Content
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    /**
     * Get the subMenu that owns the Content
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subMenu()
    {
        return $this->belongsTo(SubMenu::class, 'sub_menu_id', 'id')->withDefault();
    }

    public static function generateSlugByTitle(string $title)
    {
        $slugContent = \Str::slug($title);
        $totalContent = self::withTrashed()->where('slug', 'like', '%' . $slugContent . '%')->latest('id')->count();
        if ($totalContent > 0) {
            $slugContent .= '-'. $totalContent;
        }
        return $slugContent;
    }
}
