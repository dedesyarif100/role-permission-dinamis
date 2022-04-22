<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'user_roles';
    protected $guarded = ['id'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
