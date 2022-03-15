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
    RoleController,
    ServiceController,
    SlideShowController,
    SubMenuController,
    TrustedController,
    UserController,
};

use App\Http\Controllers\Frontend\{
    MainController,
    ConsultationController,
    ContactOurController,
    NewsController as FrontendNewsController
};
use App\Models\UserRole;
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
Route::get('services/{slug}', [MainController::class, 'services'])->name('services.show');
Route::get('service/{slug}', [MainController::class, 'serviceSingle'])->name('service_single.show');
Route::get('news', [MainController::class, 'news'])->name('news.list');
Route::get('faqs', [MainController::class, 'faq'])->name('faqs.show');
Route::get('about', [MainController::class, 'about'])->name('about.show');
Route::get('news/{slug}', [MainController::class, 'newsDetail'])->name('news.detail');
Route::post('contact_our', [ContactOurController::class, 'store'])->name('contact_our.store');
Route::post('consultation', [ConsultationController::class, 'store'])->name('consultation.store');
Route::get('news/{slug}', [FrontendNewsController::class, 'index'])->name('news.index');
Route::get('news-show/{slug}', [FrontendNewsController::class, 'show'])->name('news.show');

Route::get('admin', function () {
    return view('menu.index');
});

Route::middleware(['auth', 'role:superadmin,admin', 'permission:user.create'])->prefix('admin')->group(function () {
    Route::get('user', [UserController::class, 'accessUrl'])->name('user.index');
    Route::get('user/create', [UserController::class, 'accessUrl'])->name('user.create');
    Route::post('user/store', [UserController::class, 'accessUrl'])->name('user.store');
    Route::get('user/{id}/edit', [UserController::class, 'accessUrl'])->name('user.edit');
    Route::get('user/{id}', [UserController::class, 'accessUrl'])->name('user.show');
    Route::patch('user/{id}', [UserController::class, 'accessUrl'])->name('user.update');
    Route::delete('user/{id}', [UserController::class, 'accessUrl'])->name('user.delete');

    // Route::resource('menu',             MenuController::class);
    Route::get('menu', [MenuController::class, 'accessUrl'])->name('menu.index');
    Route::get('menu/create', [MenuController::class, 'accessUrl'])->name('menu.create');
    Route::post('menu/store', [MenuController::class, 'accessUrl'])->name('menu.store');
    Route::get('menu/{id}/edit', [MenuController::class, 'accessUrl'])->name('menu.edit');
    Route::get('menu/{id}', [MenuController::class, 'accessUrl'])->name('menu.show');
    Route::patch('menu/{id}', [MenuController::class, 'accessUrl'])->name('menu.update');
    Route::delete('menu/{id}', [MenuController::class, 'accessUrl'])->name('menu.delete');

    // Route::resource('sub-menu',         SubMenuController::class);
    Route::get('submenu', [SubMenuController::class, 'accessUrl'])->name('submenu.index');
    Route::get('submenu/create', [SubMenuController::class, 'accessUrl'])->name('submenu.create');
    Route::post('submenu/store', [SubMenuController::class, 'accessUrl'])->name('submenu.store');
    Route::get('submenu/{id}/edit', [SubMenuController::class, 'accessUrl'])->name('submenu.edit');
    Route::get('submenu/{id}', [SubMenuController::class, 'accessUrl'])->name('submenu.show');
    Route::patch('submenu/{id}', [SubMenuController::class, 'accessUrl'])->name('submenu.update');
    Route::delete('submenu/{id}', [SubMenuController::class, 'accessUrl'])->name('submenu.delete');

    // Route::resource('content',          ContentController::class);
    Route::get('content', [ContentController::class, 'accessUrl'])->name('content.index');
    Route::get('content/create', [ContentController::class, 'accessUrl'])->name('content.create');
    Route::post('content/store', [ContentController::class, 'accessUrl'])->name('content.store');
    Route::get('content/{id}/edit', [ContentController::class, 'accessUrl'])->name('content.edit');
    Route::get('content/{id}', [ContentController::class, 'accessUrl'])->name('content.show');
    Route::patch('content/{id}', [ContentController::class, 'accessUrl'])->name('content.update');
    Route::delete('content/{id}', [ContentController::class, 'accessUrl'])->name('content.delete');

    // Route::resource('about-us',         AboutUsController::class);
    Route::get('aboutus', [AboutUsController::class, 'accessUrl'])->name('aboutus.index');
    Route::get('aboutus/create', [AboutUsController::class, 'accessUrl'])->name('aboutus.create');
    Route::post('aboutus/store', [AboutUsController::class, 'accessUrl'])->name('aboutus.store');
    Route::get('aboutus/{id}/edit', [AboutUsController::class, 'accessUrl'])->name('aboutus.edit');
    Route::get('aboutus/{id}', [AboutUsController::class, 'accessUrl'])->name('aboutus.show');
    Route::patch('aboutus/{id}', [AboutUsController::class, 'accessUrl'])->name('aboutus.update');
    Route::delete('aboutus/{id}', [AboutUsController::class, 'accessUrl'])->name('aboutus.delete');

    // Route::resource('slide-show',       SlideShowController::class);
    Route::get('slideshow', [SlideShowController::class, 'accessUrl'])->name('slideshow.index');
    Route::get('slideshow/create', [SlideShowController::class, 'accessUrl'])->name('slideshow.create');
    Route::post('slideshow/store', [SlideShowController::class, 'accessUrl'])->name('slideshow.store');
    Route::get('slideshow/{id}/edit', [SlideShowController::class, 'accessUrl'])->name('slideshow.edit');
    Route::get('slideshow/{id}', [SlideShowController::class, 'accessUrl'])->name('slideshow.show');
    Route::patch('slideshow/{id}', [SlideShowController::class, 'accessUrl'])->name('slideshow.update');
    Route::delete('slideshow/{id}', [SlideShowController::class, 'accessUrl'])->name('slideshow.delete');

    // Route::resource('service',          ServiceController::class);
    Route::get('service', [ServiceController::class, 'accessUrl'])->name('service.index');
    Route::get('service/create', [ServiceController::class, 'accessUrl'])->name('service.create');
    Route::post('service/store', [ServiceController::class, 'accessUrl'])->name('service.store');
    Route::get('service/{id}/edit', [ServiceController::class, 'accessUrl'])->name('service.edit');
    Route::get('service/{id}', [ServiceController::class, 'accessUrl'])->name('service.show');
    Route::patch('service/{id}', [ServiceController::class, 'accessUrl'])->name('service.update');
    Route::delete('service/{id}', [ServiceController::class, 'accessUrl'])->name('service.delete');

    // Route::resource('trusted',          TrustedController::class);
    Route::get('trusted', [TrustedController::class, 'accessUrl'])->name('trusted.index');
    Route::get('trusted/create', [TrustedController::class, 'accessUrl'])->name('trusted.create');
    Route::post('trusted/store', [TrustedController::class, 'accessUrl'])->name('trusted.store');
    Route::get('trusted/{id}/edit', [TrustedController::class, 'accessUrl'])->name('trusted.edit');
    Route::get('trusted/{id}', [TrustedController::class, 'accessUrl'])->name('trusted.show');
    Route::patch('trusted/{id}', [TrustedController::class, 'accessUrl'])->name('trusted.update');
    Route::delete('trusted/{id}', [TrustedController::class, 'accessUrl'])->name('trusted.delete');

    // Route::resource('comment-client',   CommentClientController::class);
    Route::get('commentclient', [CommentClientController::class, 'accessUrl'])->name('commentclient.index');
    Route::get('commentclient/create', [CommentClientController::class, 'accessUrl'])->name('commentclient.create');
    Route::post('commentclient/store', [CommentClientController::class, 'accessUrl'])->name('commentclient.store');
    Route::get('commentclient/{id}/edit', [CommentClientController::class, 'accessUrl'])->name('commentclient.edit');
    Route::get('commentclient/{id}', [CommentClientController::class, 'accessUrl'])->name('commentclient.show');
    Route::patch('commentclient/{id}', [CommentClientController::class, 'accessUrl'])->name('commentclient.update');
    Route::delete('commentclient/{id}', [CommentClientController::class, 'accessUrl'])->name('commentclient.delete');

    // Route::resource('category-news',    CategoryNewsController::class);
    Route::get('categorynews', [CategoryNewsController::class, 'accessUrl'])->name('categorynews.index');
    Route::get('categorynews/create', [CategoryNewsController::class, 'accessUrl'])->name('categorynews.create');
    Route::post('categorynews/store', [CategoryNewsController::class, 'accessUrl'])->name('categorynews.store');
    Route::get('categorynews/{id}/edit', [CategoryNewsController::class, 'accessUrl'])->name('categorynews.edit');
    Route::get('categorynews/{id}', [CategoryNewsController::class, 'accessUrl'])->name('categorynews.show');
    Route::patch('categorynews/{id}', [CategoryNewsController::class, 'accessUrl'])->name('categorynews.update');
    Route::delete('categorynews/{id}', [CategoryNewsController::class, 'accessUrl'])->name('categorynews.delete');

    // Route::resource('news-list',        NewsController::class);
    Route::get('newsdata', [NewsController::class, 'accessUrl'])->name('newsdata.index');
    Route::get('newsdata/create', [NewsController::class, 'accessUrl'])->name('newsdata.create');
    Route::post('newsdata/store', [NewsController::class, 'accessUrl'])->name('newsdata.store');
    Route::get('newsdata/{id}/edit', [NewsController::class, 'accessUrl'])->name('newsdata.edit');
    Route::get('newsdata/{id}', [NewsController::class, 'accessUrl'])->name('newsdata.show');
    Route::patch('newsdata/{id}', [NewsController::class, 'accessUrl'])->name('newsdata.update');
    Route::delete('newsdata/{id}', [NewsController::class, 'accessUrl'])->name('newsdata.delete');

    // Route::resource('faq',              FaqController::class);
    Route::get('faq', [FaqController::class, 'accessUrl'])->name('faq.index');
    Route::get('faq/create', [FaqController::class, 'accessUrl'])->name('faq.create');
    Route::post('faq/store', [FaqController::class, 'accessUrl'])->name('faq.store');
    Route::get('faq/{id}/edit', [FaqController::class, 'accessUrl'])->name('faq.edit');
    Route::get('faq/{id}', [FaqController::class, 'accessUrl'])->name('faq.show');
    Route::patch('faq/{id}', [FaqController::class, 'accessUrl'])->name('faq.update');
    Route::delete('faq/{id}', [FaqController::class, 'accessUrl'])->name('faq.delete');

    // Route::resource('contact-us',       ContactUsController::class);
    Route::get('contactus', [ContactUsController::class, 'accessUrl'])->name('contactus.index');
    Route::get('contactus/create', [ContactUsController::class, 'accessUrl'])->name('contactus.create');
    Route::post('contactus/store', [ContactUsController::class, 'accessUrl'])->name('contactus.store');
    Route::get('contactus/{id}/edit', [ContactUsController::class, 'accessUrl'])->name('contactus.edit');
    Route::get('contactus/{id}', [ContactUsController::class, 'accessUrl'])->name('contactus.show');
    Route::patch('contactus/{id}', [ContactUsController::class, 'accessUrl'])->name('contactus.update');
    Route::delete('contactus/{id}', [ContactUsController::class, 'accessUrl'])->name('contactus.delete');

    // Route::resource('information',      InformationController::class);
    Route::get('information', [InformationController::class, 'accessUrl'])->name('information.index');
    Route::get('information/create', [InformationController::class, 'accessUrl'])->name('information.create');
    Route::post('information/store', [InformationController::class, 'accessUrl'])->name('information.store');
    Route::get('information/{id}/edit', [InformationController::class, 'accessUrl'])->name('information.edit');
    Route::get('information/{id}', [InformationController::class, 'accessUrl'])->name('information.show');
    Route::patch('information/{id}', [InformationController::class, 'accessUrl'])->name('information.update');
    Route::delete('information/{id}', [InformationController::class, 'accessUrl'])->name('information.delete');

    // Route::resource('consultations',    ConsultationController::class);
    Route::get('consultationdata', [ConsultationController::class, 'accessUrl'])->name('consultationdata.index');
    Route::get('consultationdata/create', [ConsultationController::class, 'accessUrl'])->name('consultationdata.create');
    Route::post('consultationdata/store', [ConsultationController::class, 'accessUrl'])->name('consultationdata.store');
    Route::get('consultationdata/{id}/edit', [ConsultationController::class, 'accessUrl'])->name('consultationdata.edit');
    Route::get('consultationdata/{id}', [ConsultationController::class, 'accessUrl'])->name('consultationdata.show');
    Route::patch('consultationdata/{id}', [ConsultationController::class, 'accessUrl'])->name('consultationdata.update');
    Route::delete('consultationdata/{id}', [ConsultationController::class, 'accessUrl'])->name('consultationdata.delete');

    // Route::resource('contact-our',      ContactOurController::class);
    Route::get('contactour', [ContactOurController::class, 'accessUrl'])->name('contactour.index');
    Route::get('contactour/create', [ContactOurController::class, 'accessUrl'])->name('contactour.create');
    Route::post('contactour/store', [ContactOurController::class, 'accessUrl'])->name('contactour.store');
    Route::get('contactour/{id}/edit', [ContactOurController::class, 'accessUrl'])->name('contactour.edit');
    Route::get('contactour/{id}', [ContactOurController::class, 'accessUrl'])->name('contactour.show');
    Route::patch('contactour/{id}', [ContactOurController::class, 'accessUrl'])->name('contactour.update');
    Route::delete('contactour/{id}', [ContactOurController::class, 'accessUrl'])->name('contactour.delete');

    Route::resource('role',             RoleController::class);
});
