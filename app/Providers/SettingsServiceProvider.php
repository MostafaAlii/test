<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
class SettingsServiceProvider extends ServiceProvider {
    public function register(): void {
        //
    }

    public function boot(): void {
        if (Schema::hasTable('settings')) {
            $settings = Setting::first();
            if ($settings !== null) {
                view()->composer('*', function ($view) use ($settings) {
                    $view->with('settings', $settings);
                });
            }
        }
    }
}