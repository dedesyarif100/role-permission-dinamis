<?php

use Illuminate\Support\Facades\DB;


use App\Models\Menu;
use App\Models\News;
use App\Models\ContactUs;
use App\Models\Information;
use App\Models\CategoryNews;

if (!function_exists('getMenu')) {
    function getMenu()
    {
        return Menu::orderBy('created_at')->get();
    }
}

if (!function_exists('getCategoryNews')) {
    function getCategoryNews()
    {
        return CategoryNews::all();
    }
}

if (!function_exists('getInformation')) {
    function getInformation()
    {
        return Information::first();
    }
}

if (!function_exists('getRecentNews')) {
    function getRecentNews()
    {
        return News::orderBy('created_at', 'desc')->limit(4)->get();
    }
}

if (!function_exists('getFacebook')) {
    function getFacebook()
    {
        return ContactUs::where('title', 'facebook')->first();
    }
}

if (!function_exists('getInstagram')) {
    function getInstagram()
    {
        return ContactUs::where('title', 'Instagram')->first();
    }
}

if (!function_exists('getLinkedin')) {
    function getLinkedin()
    {
        return ContactUs::where('title', 'Linkedin')->first();
    }
}

if (!function_exists('getWhatsapp')) {
    function getWhatsapp()
    {
        return ContactUs::where('title', 'Whatsapp')->first();
    }
}
