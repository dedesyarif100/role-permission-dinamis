<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'menu';
    protected $guarded = ['id'];

    public function subMenu()
    {
        // return $this->hasOne(SubMenu::class, 'menu_id')->latestOfMany();
        // return $this->hasOne(SubMenu::class, 'menu_id')->oldestOfMany();
        // return $this->hasOne(SubMenu::class, 'menu_id')->ofMany('name', 'min');
        // return $this->hasOne(SubMenu::class, 'menu_id')->ofMany('name', 'max');
        // return $this->hasOne(SubMenu::class, 'menu_id')->ofMany([
        //     'created_at' => 'min',
        //     'id' => 'min'
        // ],  function($query) {
        //         $query->where('created_at', '=', '2022-03-23 00:50:28');
        //         // $query->where('id', '=', '4');
        //     }
        // );
        return $this->hasMany(SubMenu::class, 'menu_id');
    }

    public function content()
    {
        return $this->hasMany(Content::class, 'menu_id');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    public function contentSubMenuHasOneThrough()
    {
        // return $this->hasOneThrough(Content::class, SubMenu::class);
        return $this->hasOneThrough(
            Content::class,
            SubMenu::class,
            'menu_id',
            'sub_menu_id',
            'id',
            'id'
        );
    }

    public function contentSubMenuHasManyThrough()
    {
        // return $this->hasManyThrough(Content::class, SubMenu::class);
        return $this->hasManyThrough(
            Content::class,
            SubMenu::class,
            'menu_id',
            'sub_menu_id',
            'id',
            'id'
        );
    }

    public function menuNews()
    {
        // return $this->morphOne(MenuNews::class, 'menuNews');
        return $this->morphOne(MenuNews::class, 'menuNews')->ofMany('id', 'min');
    }

    public function menuNewsMany()
    {
        return $this->morphMany(MenuNews::class, 'menuNews');
    }

    public function menuNewsWithLatestOfMany()
    {
        // return $this->morphOne(MenuNews::class, 'menuNews')->latestOfMany();
        return $this->morphOne(MenuNews::class, 'menuNews')->oldestOfMany();
    }

    public function news()
    {
        return $this->morphedByMany(News::class, 'menuables');
    }

    public function faq()
    {
        return $this->morphedByMany(Faq::class, 'menuables');
    }
}
