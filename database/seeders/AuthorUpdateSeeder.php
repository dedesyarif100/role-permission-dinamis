<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Author::all() as $key => $value) {
            Author::where('id', $value->id)->update([
                'book_id' => $value->id,
                'photo_id' => $value->id,
                'post_id' => $value->id
            ]);
        }
        // Author::insert([
        //     [
        //         'name' => 'Tris code',
        //         // 'book_id' => 1,
        //         // 'photo_id' => 1,
        //         // 'post_id' => 1
        //     ],
        //     [
        //         'name' => 'Ali code',
        //         // 'book_id' => 1,
        //         // 'photo_id' => 1,
        //         // 'post_id' => 2
        //     ],
        //     [
        //         'name' => 'Rian code',
        //         // 'book_id' => 1,
        //         // 'photo_id' => 2,
        //         // 'post_id' => 3
        //     ],
        // ]);
    }
}
