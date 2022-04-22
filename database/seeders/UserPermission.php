<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\UserPermission as ModelsUserPermission;
use Illuminate\Database\Seeder;

class UserPermission extends Seeder
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
                ModelsUserPermission::create([
                    'user_id' => $i,
                    'permission_id' => $j,
                ]);
            }
        }
    }
}
