<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\service\AttendanceService;

class AttendanceServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('attendanceService', function()
        {
            return new AttendanceService();
        });
    }

}