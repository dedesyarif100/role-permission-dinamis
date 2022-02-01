<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us')->insert([
            [
                'title' => 'Basic Engineering',
                'whatsapp_number' => '085155125151',
                'instagram' => 'dede syarif',
                'linkedin' => 'dede syarif',
                'facebook' => 'dede syarif',
                'description' => 'test',
                'image' => 'test',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
