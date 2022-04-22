<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Custom Polymorphic Types
        Relation::enforceMorphMap([
            'NewsModel' => 'App\Models\News',
            'FaqModel' => 'App\Models\Faq',
            'MenuModel' => 'App\Models\Menu',
            'PhotoModel' => 'App\Models\Photo',
            'PostModel' => 'App\Models\Post',
            'TagModel' => 'App\Models\Tag',
            'CommentModel' => 'App\Models\Comment',
            'ActivityFeedModel' => 'App\Models\ActivityFeed',
            'BookModel' => 'App\Models\Book',
            'AuthorModel' => 'App\Models\Author'
        ]);
    }
}
