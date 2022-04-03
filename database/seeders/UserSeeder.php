<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'superadmin',
                'account_id' => 1,
                'email' => 'superadmin@mail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'admin',
                'account_id' => 2,
                'email' => 'admin@mail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'user',
                'account_id' => 3,
                'email' => 'user@mail.com',
                'password' => Hash::make('12345678')
            ],
        ]);
    }
}
