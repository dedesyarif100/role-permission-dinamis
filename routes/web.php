<?php

use App\Http\Controllers\{
    AboutUsController,
    CategoryNewsController,
    CommentClientController,
    ContactUsController,
    ContentController,
    FaqController,
    InformationController,
    MenuController,
    NewsController,
    ServiceController,
    SlideShowController,
    SubMenuController,
    TrustedController
};

use App\Http\Controllers\Frontend\{
    MainController,
    ConsultationController,
    ContactOurController,
    NewsController as FrontendNewsController
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

require __DIR__.'/auth.php';

Route::get('/', [MainController::class, 'index']);
Route::get('services/{id}/{slug}', [MainController::class, 'services'])->name('services.show');
Route::get('service/{slug}', [MainController::class, 'serviceSingle'])->name('service_single.show');
Route::get('news', [MainController::class, 'news'])->name('news.list');
Route::get('news/{slug}', [MainController::class, 'newsDetail'])->name('news.detail');
Route::post('contact_our', [ContactOurController::class, 'store'])->name('contact_our.store');
Route::post('consultation', [ConsultationController::class, 'store'])->name('consultation.store');
Route::get('news/{slug}', [FrontendNewsController::class, 'index'])->name('news.index');
Route::get('news-show/{slug}', [FrontendNewsController::class, 'show'])->name('news.show');

Route::get('admin', function () {
    return view('menu.index');
});

Route::middleware('auth')->group(function () {
    Route::resource('menu', MenuController::class);
    Route::resource('sub-menu', SubMenuController::class);
    Route::resource('content', ContentController::class);
    Route::resource('about-us', AboutUsController::class);
    Route::resource('slide-show', SlideShowController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('trusted', TrustedController::class);
    Route::resource('comment-client', CommentClientController::class);
    Route::resource('category-news', CategoryNewsController::class);
    Route::resource('news-list', NewsController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('contact-us', ContactUsController::class);
    Route::resource('information', InformationController::class);
});
