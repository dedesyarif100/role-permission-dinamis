<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photo::insert([
            [
                'name' => 'photo 1',
                'author_id' => 1,
                'post_id' => 1
            ],
            [
                'name' => 'photo 2',
                'author_id' => 1,
                'post_id' => 2
            ],
            [
                'name' => 'photo 3',
                'author_id' => 1,
                'post_id' => 3
            ],
        ]);
    }
}
