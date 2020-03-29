<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Blade;
use DB;
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
        // Data Kehadiran Per Siswa
        view()->composer('layouts/layout', function($view)
        {
            $view->with('resto',DB::table('tb_resto')->first());
         
        });
       Schema::defaultStringLength(191);
       Blade::directive('currency', function ($expression) {
        return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
    });
    }
}
