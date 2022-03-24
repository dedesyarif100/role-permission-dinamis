<?php

namespace App\Providers;

use App\View\Components\Alert;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
// use Illuminate\View\ViewServiceProvider as ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Blade::component('package-alert', Alert::class);
        Blade::componentNamespace('Nightshade\\Views\\Components', 'nightshade');
    }
}
