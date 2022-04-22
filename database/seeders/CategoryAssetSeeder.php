<?php

namespace Database\Seeders;

use App\Models\CategoryAsset;
use Illuminate\Database\Seeder;

class CategoryAssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryAsset::insert([
            [
                'name' => 'Komputer',
                'code' => 'IT',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'General Affair',
                'code' => 'GA',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'AC',
                'code' => 'AC',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
