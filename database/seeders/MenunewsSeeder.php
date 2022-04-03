<?php

namespace Database\Seeders;

use App\Models\MenuNews;
use Illuminate\Database\Seeder;

class MenunewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuNews::insert([
            [
                'title' => 'html',
                'content' => 'content 1',
                'menunews_id' => 1,
                'menunews_type' => 'MenuModel'
            ],
            [
                'title' => 'html css',
                'content' => 'content 2',
                'menunews_id' => 1,
                'menunews_type' => 'MenuModel'
            ],
            [
                'title' => 'html javascript',
                'content' => 'content 3',
                'menunews_id' => 2,
                'menunews_type' => 'MenuModel'
            ],
            [
                'title' => 'jquery',
                'content' => 'html jquery',
                'menunews_id' => 2,
                'menunews_type' => 'MenuModel'
            ],
            [
                'title' => 'bootstraps',
                'content' => 'javascript html',
                'menunews_id' => 3,
                'menunews_type' => 'MenuModel'
            ],
            [
                'title' => 'tailwind',
                'content' => 'vuejs html',
                'menunews_id' => 3,
                'menunews_type' => 'MenuModel'
            ],
            [
                'title' => 'html saas',
                'content' => null,
                'menunews_id' => 1,
                'menunews_type' => 'NewsModel'
            ],
            [
                'title' => 'php',
                'content' => null,
                'menunews_id' => 3,
                'menunews_type' => 'NewsModel'
            ],
            [
                'title' => 'mysql',
                'content' => null,
                'menunews_id' => 3,
                'menunews_type' => 'NewsModel'
            ],
            [
                'title' => 'laravel html',
                'content' => null,
                'menunews_id' => 3,
                'menunews_type' => 'FaqModel'
            ],
            [
                'title' => 'vuejs html',
                'content' => null,
                'menunews_id' => 3,
                'menunews_type' => 'FaqModel'
            ],
            [
                'title' => 'docker',
                'content' => null,
                'menunews_id' => 3,
                'menunews_type' => 'FaqModel'
            ],
        ]);
    }
}
