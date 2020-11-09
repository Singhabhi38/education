<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\service\ScheduleService;

class ScheduleServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('scheduleService', function()
        {
            return new ScheduleService();
        });
    }

}