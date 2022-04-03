<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::insert([
            [
                'name' => 'Admin',
                'address' => 'sby',
                'contact' => '077374774',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'User',
                'address' => 'sby',
                'contact' => '077374774',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
