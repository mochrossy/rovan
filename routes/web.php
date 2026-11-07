<?php
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServicePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/news/{slug}', [PageController::class, 'post'])->name('post');
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/sitemap.xml', [PageController::class, 'sitemap']);

Route::get('/tentang', [ServicePageController::class, 'about'])->name('about');
Route::get('/services', [ServicePageController::class, 'services'])->name('services');
Route::redirect('/layanan', '/services', 301);
Route::get('/services/{slug}', [ServicePageController::class, 'service'])->name('service');
Route::redirect('/layanan/{slug}', '/services/{slug}', 301);
Route::get('/faq', [ServicePageController::class, 'faq'])->name('faq');
Route::get('/kontak', [ServicePageController::class, 'contact'])->name('contact');
Route::get('/privacy-policy', [ServicePageController::class, 'privacy'])->name('privacy');
Route::post('/kontak', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.index', \App\Support\Roles::home(\App\Support\Roles::current())));
    Route::get('messages', [MessageController::class, 'index'])->name('admin.messages');
    Route::get('messages/{id}', [MessageController::class, 'show'])->name('admin.messages.show');
    Route::delete('messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');
    Route::get('users', [UserController::class, 'index'])->name('admin.users');
    Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('{type}', [ContentController::class, 'index'])->name('admin.index');
    Route::get('{type}/create', [ContentController::class, 'create'])->name('admin.create');
    Route::post('{type}', [ContentController::class, 'store'])->name('admin.store');
    Route::get('{type}/{id}/edit', [ContentController::class, 'edit'])->name('admin.edit');
    Route::put('{type}/{id}', [ContentController::class, 'update'])->name('admin.update');
    Route::delete('{type}/{id}', [ContentController::class, 'destroy'])->name('admin.destroy');
});

// Breeze mengarahkan ke route 'dashboard' setelah login
Route::get('/dashboard', fn () => redirect('/admin'))->middleware('auth')->name('dashboard');

require __DIR__ . '/auth.php';
