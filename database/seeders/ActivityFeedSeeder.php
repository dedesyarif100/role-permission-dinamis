<?php

namespace Database\Seeders;

use App\Models\ActivityFeed;
use Illuminate\Database\Seeder;

class ActivityFeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityFeed::insert([
            [
                'name' => 'activity 1',
                'activity_feed_id' => 1,
                'activity_feed_type' => 'PhotoModel',
            ],
            [
                'name' => 'activity 2',
                'activity_feed_id' => 1,
                'activity_feed_type' => 'PhotoModel',
            ],
            [
                'name' => 'activity 3',
                'activity_feed_id' => 1,
                'activity_feed_type' => 'PostModel',
            ],
        ]);
    }
}
