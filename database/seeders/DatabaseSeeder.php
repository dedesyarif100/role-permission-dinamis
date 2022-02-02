<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(MenuSeeder::class);
        $this->call(SubMenuSeeder::class);
        $this->call(ContentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AboutUsSeeder::class);
        $this->call(ConsultationSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(ContactOurSeeder::class);
    }
}
