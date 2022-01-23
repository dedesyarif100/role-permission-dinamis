<?php

use App\Http\Controllers\{
    AboutController,
    ContentController,
    MenuController,
    SubMenuController
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

Route::resource('/', MainController::class);

Route::get('admin', function () {
    return view('menu.index');
});

Route::resource('menu', MenuController::class);
Route::get('editor-menu/{id?}', [MenuController::class, 'editorMenu'])->name('editor.menu');

Route::resource('sub-menu', SubMenuController::class);
Route::get('editor-submenu/{id?}', [SubMenuController::class, 'editorSubMenu'])->name('editor.submenu');

Route::resource('content', ContentController::class);
Route::get('editor-content/{id?}', [ContentController::class, 'editorContent'])->name('editor.content');

Route::resource('about-us', AboutController::class);
Route::get('get-about-us', [AboutController::class, 'getAboutUs'])->name('about.getaboutus');

