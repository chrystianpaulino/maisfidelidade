<?php

namespace App\Providers;

use App\Models\Cliente;
use App\Models\Saldo;
use App\Observers\ClienteObserver;
use App\Observers\SaldoObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Cliente::observe(ClienteObserver::class);
        Saldo::observe(SaldoObserver::class);
    }
}
