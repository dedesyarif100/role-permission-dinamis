<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RolePermission extends Pivot
{
    use HasFactory;
    protected $table = 'role_permission';
    protected $guarded = ['id'];

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id', 'id');
    }
}
