<?php

namespace App\Providers;

use App\Adapters\Database\Repository\FacturasApagarRepositorio;
use App\Domain\Repository\FacturasApagarInterfaz;
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
        $this->app->bind(FacturasApagarInterfaz::class, FacturasApagarRepositorio::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
