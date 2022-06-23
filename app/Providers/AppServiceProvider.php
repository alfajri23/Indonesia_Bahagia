<?php

namespace App\Providers;

use App\Models\MasterKontak;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();

        View()->composer('components.footer.footer_user', function ($view) {
            $data = MasterKontak::first();
            
            
            $view->with('data', $data);
        });
    }
}
