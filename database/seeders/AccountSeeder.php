<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::insert([
            [
                'name' => 'account 1'
            ],
            [
                'name' => 'account 2'
            ],
            [
                'name' => 'account 3'
            ],
        ]);
    }
}
