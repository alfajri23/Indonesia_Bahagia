<?php

namespace App\Providers;

use App\Helpers\Telepon;
use App\Models\MasterKontak;
use App\Models\MasterSettingProgram;
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
        config(['app.locale'=>'id']);
        Paginator::useBootstrap();

        View()->composer('components.footer.footer_user', function ($view) {
            $data = MasterKontak::first();
            $view->with('data', $data);
        });

        View()->composer('components.navbar.navbar_users', function ($view) {
            $data = MasterSettingProgram::find(1);
            $view->with('data', $data->foto);
        });

        View()->composer('components.floating_button.floating_button', function ($view) {
            $data = MasterKontak::first();
            $data = Telepon::changeTo62($data);
            $view->with('data', $data);
        });
    }
}
