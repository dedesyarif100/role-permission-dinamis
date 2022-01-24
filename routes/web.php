<?php

use App\Http\Controllers\{
    AboutController,
    ContentController,
    MenuController
};

use App\Http\Controllers\Frontend\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index']);
Route::get('/{id}/{slug}', [MainController::class, 'service'])->name('services.show');
Route::get('/{id}/{slug}', [MainController::class, 'news'])->name('news.show');

Route::get('admin', function () {
    return view('menu.index');
});

Route::resource('menu', MenuController::class);
Route::resource('content', ContentController::class);
Route::resource('about-us', AboutController::class);
