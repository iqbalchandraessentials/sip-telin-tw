<?php

namespace App\Providers;

use BladeUI\Icons\Factory;
use App\View\Components\TaiwanMap;
use Illuminate\Support\Facades\Blade;
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
        $this->app->bind(
            'App\Interfaces\ActivationStoreInterface',
            'App\Repositories\ActivationStoreRepository',
            'App\Interfaces\DashboardInterface',
            'App\Repositories\DashboardRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('taiwan-map', TaiwanMap::class);
        Blade::include('includes.downloadIcon', 'downloadSvg');
        Blade::include('includes.addIcon', 'addSvg');
    }
}
