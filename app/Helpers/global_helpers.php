<?php

use Illuminate\Support\Facades\DB;

use App\Models\Menu;
use App\Models\Information;

if (!function_exists('getMenu')) {
    function getMenu()
    {
        return Menu::orderBy('created_at')->get();
    }
}

if (!function_exists('getInformation')) {
    function getInformation()
    {
        return Information::first();
    }
}
