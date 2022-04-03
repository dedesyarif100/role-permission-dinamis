<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::insert([
            [
                'name' => 'comments 1',
                'post_id' => 1
            ],
            [
                'name' => 'comments 2',
                'post_id' => 1
            ],
            [
                'name' => 'comments 3',
                'post_id' => 2
            ],
        ]);
    }
}
