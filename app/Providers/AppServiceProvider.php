<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Pembelian;
use App\Models\Pesanan;
use App\Observers\PembelianObserver;
use App\Observers\PesananObserver;

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
        Pembelian::observe(PembelianObserver::class);
        Pesanan::observe(PesananObserver::class);
    }
}
