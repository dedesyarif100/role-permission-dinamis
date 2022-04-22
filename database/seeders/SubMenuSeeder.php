<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_menu')->insert([
            [
                'menu_id' => 1,
                'name' => 'Working Visa',
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'menu_id' => 1,
                'name' => 'Dependent Visa',
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'menu_id' => 1,
                'name' => 'Spouse Visa',
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'menu_id' => 1,
                'name' => 'Retirement Visa',
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'menu_id' => 1,
                'name' => 'Calling Visa',
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
