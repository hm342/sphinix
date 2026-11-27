<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::prefix('services')->name('services.')->group(function (): void {
    Route::get('/', [PageController::class, 'services'])->name('index');
    Route::get('/seo', [PageController::class, 'seo'])->name('seo');
    Route::get('/social-media-marketing', [PageController::class, 'socialMedia'])->name('social');
});

Route::get('/products', [PageController::class, 'products'])->name('products.index');

Route::prefix('work')->name('work.')->group(function (): void {
    Route::get('/', [WorkController::class, 'index'])->name('index');
    Route::get('/{slug}', [WorkController::class, 'show'])
        ->where('slug', '[a-z0-9-]+')
        ->name('show');
});

Route::get('/insights', [PageController::class, 'insights'])->name('insights.index');
Route::redirect('/blog', '/insights', 301)->name('blog.redirect');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/newsletter', [ContactController::class, 'subscribe'])->name('newsletter.subscribe');
