<?php

namespace Database\Seeders;

use App\Models\Menuable;
use Illuminate\Database\Seeder;

class MenuableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menuable::insert([
            [
                'menu_id' => 1,
                'menuables_id' => 1,
                'menuables_type' => 'FaqModel'
            ],
            [
                'menu_id' => 2,
                'menuables_id' => 1,
                'menuables_type' => 'FaqModel'
            ],
            [
                'menu_id' => 1,
                'menuables_id' => 1,
                'menuables_type' => 'NewsModel'
            ],
            [
                'menu_id' => 2,
                'menuables_id' => 2,
                'menuables_type' => 'NewsModel'
            ],
            [
                'menu_id' => 3,
                'menuables_id' => 3,
                'menuables_type' => 'NewsModel'
            ],
        ]);
    }
}
