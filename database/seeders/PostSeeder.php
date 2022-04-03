<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::insert([
            [
                'name' => 'laravel post 1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'css post 2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'go post 3',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
