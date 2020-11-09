<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\DAO\CourseDAO;

class CourseDAOProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('courseDAO', function()
        {
            return new CourseDAO();
        });
    }

}