<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $action = ['view', 'create', 'store', 'edit', 'update', 'destroy'];
        foreach ($action as $value) {
            Permission::create([
                'name' => 'aboutus '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'categorynews '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'commentclient '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'consultation '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'contactour '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'contactus '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'contect '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'faq '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'information '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'menu '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'news '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'service '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'slideshow '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'submenu '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'trusted '.$value
            ]);
        }

        foreach ($action as $value) {
            Permission::create([
                'name' => 'user '.$value
            ]);
        }
    }
}
