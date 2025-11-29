<?php

namespace App\Providers;

use App\Models\CompanyProfile;
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
        View::composer('*', function ($view) {

            // Mapping prefix URL -> site_id
            $siteMapping = [
                'yayasan' => 1,
                'tk'      => 2,
                'sd'      => 3,
                'smp'     => 4,
                'sma'     => 5,
            ];

            // Ambil segmen pertama dari URL
            $firstSegment = request()->segment(1); // misal: yayasan/home → "yayasan"

            // Tentukan site_id berdasarkan mapping, default 1 kalau tidak ditemukan
            $site_id = $siteMapping[$firstSegment] ?? 1;

            // Ambil data profile sesuai site
            $profile = CompanyProfile::where('site_id', $site_id)->first();

            // Kirim ke semua view, termasuk komponen
            $view->with('profile', $profile);
        });
    }
}
