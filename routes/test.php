<?php

use Illuminate\Support\Facades\Route;

Route::get('test', function() {
    dd('test');
});

Route::any('any', function() {
    dd('any route');
});
