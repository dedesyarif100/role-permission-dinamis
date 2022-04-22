<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'role_permission')->limit(10)->offset(10)->withPivot('id', 'created_at', 'updated_at');
    }

    public function permissionWithTimeStamp()
    {
        return $this->belongsToMany(Permission::class, 'role_permission')->withTimestamps()->limit(5);
    }

    public function permissionWithAsTimeStamp()
    {
        return $this->belongsToMany(Permission::class, 'role_permission')->as('permissionWithAs')->withTimestamps()->limit(5);
    }

    public function permissionWithWherePivot()
    {
        return $this->belongsToMany(Permission::class, 'role_permission')->wherePivot('permission_id', 5)->withTimestamps();
    }

    public function permissionWithWherePivotIn()
    {
        return $this->belongsToMany(Permission::class, 'role_permission')->wherePivotIn('permission_id', [2, 3, 10, 12]);
    }

    public function permissionWithWherePivotNotIn()
    {
        return $this->belongsToMany(Permission::class, 'role_permission')->wherePivotNotIn('permission_id', [2, 3, 10, 12]);
    }

    public function permissionWithWherePivotBetween()
    {
        return $this->belongsToMany(Permission::class, 'role_permission')->wherePivotBetween('permission_id', [2, 10]);
    }

    public function permissionWithWherePivotNotBetween()
    {
        return $this->belongsToMany(Permission::class, 'role_permission')->wherePivotNotBetween('permission_id', [2, 10]);
    }

    public function permissionWithWherePivotNull()
    {
        return $this->belongsToMany(Permission::class, 'role_permission')->wherePivotNull('created_at')->withTimestamps();
    }

    public function permissionWithWherePivotNotNull()
    {
        return $this->belongsToMany(Permission::class, 'role_permission')->wherePivotNotNull('created_at')->withTimestamps();
    }

    public function permissionWithUsing()
    {
        return $this->belongsToMany(Permission::class, 'role_permission')->using(RolePermission::class)->withTimestamps()->limit(5);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id');
    }

    public function manyPermission()
    {
        // return $this->hasMany(Permission::class);
        return $this->hasMany(RolePermission::class);
    }
}
