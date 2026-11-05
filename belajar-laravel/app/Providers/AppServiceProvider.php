<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // dibuat 1x per request, dan baru dijalankan saat pertama kali dipakai
        $this->app->scoped('site.settings', function () {
            // pluck itu untuk manggil tanpa value(->value), pasti bentuk nya array assosiative
            return Schema::hasTable('settings') ? Setting::pluck('value', 'key') : collect();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Jangan query database langsung di boot(): saat `php artisan migrate` di database
        // yang masih kosong, tabel settings belum ada dan perintahnya akan error.
        View::composer('*', function ($view) {
            $view->with('settings', app('site.settings'));
        });

        // daftar kategori untuk dropdown di header halaman publik
        View::composer('layouts._inc.header', function ($view) {
            $view->with(
                'navCategories',
                Schema::hasTable('categories') ? Category::orderBy('sort_order')->get() : collect()
            );
        });
    }
}
