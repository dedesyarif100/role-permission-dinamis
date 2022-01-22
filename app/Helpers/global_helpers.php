<?php

use Illuminate\Support\Facades\DB;

use App\Models\Menu;

if (!function_exists('getMenu')) {
    function getMenu()
    {
        return Menu::orderBy('created_at')->get();
    }
}
