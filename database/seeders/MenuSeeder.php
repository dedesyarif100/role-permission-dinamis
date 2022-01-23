<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            [
                'name' => 'Visa Services',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Company Establishment',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tax & Accounting',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Real Estate',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
