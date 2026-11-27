<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CaseStudyController as AdminCaseStudyController;
use App\Http\Controllers\Admin\ClientLogoController as AdminClientLogoController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\InsightController as AdminInsightController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\SubscriberController as AdminSubscriberController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
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

Route::prefix('insights')->name('insights.')->group(function (): void {
    Route::get('/', [PageController::class, 'insights'])->name('index');
    Route::get('/{slug}', [PageController::class, 'insightShow'])
        ->where('slug', '[a-z0-9-]+')
        ->name('show');
});
Route::redirect('/blog', '/insights', 301)->name('blog.redirect');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/newsletter', [ContactController::class, 'subscribe'])->name('newsletter.subscribe');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::middleware(['auth', 'admin'])->group(function (): void {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('logos', AdminClientLogoController::class)->except(['show']);
        Route::resource('work', AdminCaseStudyController::class)->except(['show']);
        Route::delete('work/{work}/slides/{slide}', [AdminCaseStudyController::class, 'destroySlide'])->name('work.slides.destroy');
        Route::resource('insights', AdminInsightController::class)->except(['show']);
        Route::resource('services', AdminServiceController::class)->except(['show']);
        Route::resource('testimonials', AdminTestimonialController::class)->except(['show']);
        Route::resource('faqs', AdminFaqController::class)->except(['show']);

        Route::get('inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
        Route::get('inquiries/{inquiry}', [AdminInquiryController::class, 'show'])->name('inquiries.show');
        Route::patch('inquiries/{inquiry}', [AdminInquiryController::class, 'update'])->name('inquiries.update');
        Route::delete('inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');

        Route::get('subscribers', [AdminSubscriberController::class, 'index'])->name('subscribers.index');
        Route::get('subscribers/export', [AdminSubscriberController::class, 'export'])->name('subscribers.export');
        Route::patch('subscribers/{subscriber}/toggle', [AdminSubscriberController::class, 'toggle'])->name('subscribers.toggle');
        Route::delete('subscribers/{subscriber}', [AdminSubscriberController::class, 'destroy'])->name('subscribers.destroy');

        Route::get('settings', [AdminSettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });
});
