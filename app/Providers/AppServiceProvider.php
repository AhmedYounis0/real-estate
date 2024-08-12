<?php

namespace App\Providers;

use App\Models\Amenity;
use App\Models\Location;
use App\Models\Setting;
use App\Models\Type;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Cache the settings for an hour (60 minutes)
        $settings = Cache::remember('site_settings', 60, function () {
            return Setting::all()->mapWithKeys(function ($setting) {
                return [
                    $setting->key => [
                        'value' => $setting->value,
                        'image' => $setting->image,
                    ]
                ];
            })->toArray();
        });

        $footerLocations = Cache::remember('footer_locations', 60, function () {
           return Location::all()->take(4);
        });

        View::share([
            'siteSettings' => $settings,
            'footerLocations' => $footerLocations,
        ]);
    }
}
