<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade; // PASTIKAN BARIS INI ADA DI BAGIAN ATAS FILE

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
        // Aktifkan kembali baris ini
        //Blade::anonymousComponentPaths([
         //   resource_path('views/components'),
       // ]);
    }
}
