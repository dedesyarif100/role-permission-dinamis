<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::insert([
            [
                'name' => 'genre 1'
            ],
            [
                'name' => 'genre 2'
            ],
            [
                'name' => 'genre 3'
            ],
        ]);
    }
}
