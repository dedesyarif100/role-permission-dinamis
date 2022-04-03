<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::insert([
            [
                'name' => 'Tris code',
                // 'book_id' => 1,
                // 'photo_id' => 1,
                // 'post_id' => 1
            ],
            [
                'name' => 'Ali code',
                // 'book_id' => 1,
                // 'photo_id' => 1,
                // 'post_id' => 2
            ],
            [
                'name' => 'Rian code',
                // 'book_id' => 1,
                // 'photo_id' => 2,
                // 'post_id' => 3
            ],
        ]);
    }
}
