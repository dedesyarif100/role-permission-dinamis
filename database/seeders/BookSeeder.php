<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::insert([
            [
                'name' => 'book 1',
                'author_id' => 1,
                'publisher_id' => 1,
                'genre_id' => 1,
            ],
            [
                'name' => 'book 2',
                'author_id' => 2,
                'publisher_id' => 2,
                'genre_id' => 1,
            ],
            [
                'name' => 'book 3',
                'author_id' => 3,
                'publisher_id' => 2,
                'genre_id' => 1,
            ],
            [
                'name' => 'book 4',
                'author_id' => 1,
                'publisher_id' => 1,
                'genre_id' => 1,
            ],
            [
                'name' => 'book 5',
                'author_id' => 2,
                'publisher_id' => 1,
                'genre_id' => 1,
            ],
            [
                'name' => 'book 6',
                'author_id' => 3,
                'publisher_id' => 1,
                'genre_id' => 1,
            ],
        ]);
    }
}
