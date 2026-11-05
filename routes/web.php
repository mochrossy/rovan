<?php
use App\Http\Controllers\Admin\ContentController;
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

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::redirect('/', '/admin/posts');
    Route::get('{type}', [ContentController::class, 'index'])->name('admin.index');
    Route::get('{type}/create', [ContentController::class, 'create'])->name('admin.create');
    Route::post('{type}', [ContentController::class, 'store'])->name('admin.store');
    Route::get('{type}/{id}/edit', [ContentController::class, 'edit'])->name('admin.edit');
    Route::put('{type}/{id}', [ContentController::class, 'update'])->name('admin.update');
    Route::delete('{type}/{id}', [ContentController::class, 'destroy'])->name('admin.destroy');
});

// Breeze mengarahkan ke route 'dashboard' setelah login
Route::redirect('/dashboard', '/admin/posts')->middleware('auth')->name('dashboard');

require __DIR__ . '/auth.php';
