<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::insert([
            [
                'name' => 'tags 1',
                'photo_id' => 1
            ],
            [
                'name' => 'tags 2',
                'photo_id' => 1
            ],
            [
                'name' => 'tags 3',
                'photo_id' => 2
            ],
        ]);
    }
}
