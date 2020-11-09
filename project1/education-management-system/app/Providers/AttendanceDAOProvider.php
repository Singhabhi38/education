<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\dao\AttendanceDAO;

class AttendanceDAOProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('attendanceDAO', function()
        {
            return new AttendanceDAO();
        });
    }

}