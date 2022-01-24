<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;

    protected $table = 'sub_menu';

    public function menu() 
    {
        return $this->belongsTo(Menu::class, 'menu_id')->withDefault();
    }

    public function content() 
    {
        return $this->hasOne(Content::class, 'sub_menu_id');
    }
}
