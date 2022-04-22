<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubMenu extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sub_menu';

    protected $guarded = ['id'];

    public function menu()
    {
        // return $this->belongsTo(Menu::class, 'menu_id')->withDefault(function($menu, $subMenu) {
        //     $menu->name = 'Dede Syarifudin';
        // });

        // return $this->belongsTo(Menu::class, 'menu_id')->withDefault([
        //     'name' => 'Guest Author',
        // ]);

        return $this->belongsTo(Menu::class, 'menu_id')->withDefault();
    }

    public function content()
    {
        return $this->hasOne(Content::class, 'sub_menu_id');
        // return $this->hasMany(Content::class, 'sub_menu_id');
    }

    public function contentHasMany()
    {
        return $this->hasMany(Content::class, 'sub_menu_id');
    }
}
