<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactOurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_ours')->insert([
            [
                'name' => 'dede',
                'email' => 'dede@mail.com',
                'phone' => '085121521521',
                'subject' => 'test',
                'message' => 'test'
            ],
            [
                'name' => 'hend',
                'email' => 'hend@mail.com',
                'phone' => '085121521521',
                'subject' => 'test',
                'message' => 'test'
            ],
            [
                'name' => 'rian',
                'email' => 'rian@mail.com',
                'phone' => '085121521521',
                'subject' => 'test',
                'message' => 'test'
            ],
            [
                'name' => 'trisuli',
                'email' => 'trisuli@mail.com',
                'phone' => '085121521521',
                'subject' => 'test',
                'message' => 'test'
            ],
        ]);
    }
}
