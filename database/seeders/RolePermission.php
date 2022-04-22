<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\RolePermission as ModelsRolePermission;
use Illuminate\Database\Seeder;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            for ($j = 1; $j <= Permission::count(); $j++) {
                ModelsRolePermission::create([
                    'role_id' => $i,
                    'permission_id' => $j,
                ]);
            }
        }
    }
}
