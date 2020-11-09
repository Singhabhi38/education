<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('APP_DEBUG') == true){
            return;
            DB::Listen(function($query){
                \App\Log\LogUtil::getLoggerInstance(AppServiceProvider::class)->info('DB.LISTEN ~SQL~ Query : '. $query->sql);
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
