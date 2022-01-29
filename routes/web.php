<?php

use App\Http\Controllers\{
    AboutController,
    ContentController,
    MenuController,
    SubMenuController
};

use App\Http\Controllers\Frontend\{
    MainController,
    ConsultationController,
    ContactOurController
};
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
Route::get('services/{id}/{slug}', [MainController::class, 'service'])->name('services.show');
Route::get('news', [MainController::class, 'news'])->name('news.list');
Route::get('news/{slug}', [MainController::class, 'newsDetail'])->name('news.detail');
Route::post('contact_our', [ContactOurController::class, 'store'])->name('contact_our.store');
Route::post('consultation', [ConsultationController::class, 'store'])->name('consultation.store');

Route::get('admin', function () {
    return view('menu.index');
});

Route::resource('menu', MenuController::class);

Route::resource('sub-menu', SubMenuController::class);

Route::resource('content', ContentController::class);

Route::resource('about-us', AboutController::class);

