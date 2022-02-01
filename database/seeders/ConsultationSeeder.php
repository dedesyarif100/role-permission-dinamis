<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consultations')->insert([
            [
                'name' => 'dede',
                'email' => 'dede@mail.com',
                'company' => 'basic',
                'phone' => '085121251521',
                'message' => 'test',
                'consultation_type' => 'test',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'hendro',
                'email' => 'hendro@mail.com',
                'company' => 'basic',
                'phone' => '085121251521',
                'message' => 'test',
                'consultation_type' => 'test',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'rian',
                'email' => 'rian@mail.com',
                'company' => 'basic',
                'phone' => '085121251521',
                'message' => 'test',
                'consultation_type' => 'test',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'trisuli',
                'email' => 'trisuli@mail.com',
                'company' => 'basic',
                'phone' => '085121251521',
                'message' => 'test',
                'consultation_type' => 'test',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'mirdas',
                'email' => 'mirdas@mail.com',
                'company' => 'basic',
                'phone' => '085121251521',
                'message' => 'test',
                'consultation_type' => 'test',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ali',
                'email' => 'ali@mail.com',
                'company' => 'basic',
                'phone' => '085121251521',
                'message' => 'test',
                'consultation_type' => 'test',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
