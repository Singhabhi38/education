<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\DAO\ScheduleDAO;

class ScheduleDAOProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('scheduleDAO', function()
        {
            return new ScheduleDAO();
        });
    }

}