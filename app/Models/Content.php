<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'content';

    public function subMenu() 
    {
        return $this->belongsTo(SubMenu::class, 'sub_menu_id');
    }
}
