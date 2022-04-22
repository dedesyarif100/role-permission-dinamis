<?php

namespace Database\Seeders;

use App\Models\Commentable;
use Illuminate\Database\Seeder;

class CommentablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commentable::insert([
            [
                'comment_id' => 1,
                'commentable_id' => 1,
                'commentable_type' => 'CommentModel'
            ],
            [
                'comment_id' => 1,
                'commentable_id' => 2,
                'commentable_type' => 'CommentModel'
            ],
            [
                'comment_id' => 1,
                'commentable_id' => 1,
                'commentable_type' => 'CommentModel'
            ],
            [
                'comment_id' => 1,
                'commentable_id' => 2,
                'commentable_type' => 'CommentModel'
            ],
        ]);
    }
}
