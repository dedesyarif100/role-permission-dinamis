<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('content')->insert([
            [
                'menu_id' => 1,
                'sub_menu_id' => 1,
                'slug' => 'Menu',
                'title' => 'Title Menu',
                'sub_title' => 'New Year 2022',
                'description' => 'New year 2022, this is amazing',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'menu_id' => 1,
                'sub_menu_id' => 1,
                'slug' => 'Menu',
                'title' => 'Title Menu',
                'sub_title' => 'Software Engineer',
                'description' => 'I`am a Software Engineer',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'menu_id' => 1,
                'sub_menu_id' => 1,
                'slug' => 'Menu',
                'title' => 'Title Menu',
                'sub_title' => 'Travelling in Singapura',
                'description' => 'Singapura, country is amazing',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
