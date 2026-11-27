<?php

namespace App\Providers;

use App\Models\ContactInquiry;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer(['components.site-header', 'components.site-footer', 'components.layouts.app'], static function ($view): void {
            $megaServices = collect();
            try {
                if (Schema::hasTable('services')) {
                    $megaServices = Service::active()->get();
                }
            } catch (\Throwable) {
                $megaServices = collect();
            }

            $view->with([
                'megaServices' => $megaServices,
                'siteSettings' => SiteSetting::allMap(),
            ]);
        });

        View::composer('admin.*', static function ($view): void {
            $newInquiriesCount = 0;
            try {
                if (Schema::hasTable('contact_inquiries')) {
                    $newInquiriesCount = ContactInquiry::query()->where('status', 'new')->count();
                }
            } catch (\Throwable) {
                $newInquiriesCount = 0;
            }

            $view->with('newInquiriesCount', $newInquiriesCount);
        });
    }
}
