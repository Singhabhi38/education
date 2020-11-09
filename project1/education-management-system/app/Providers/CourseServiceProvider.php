<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\Service\CourseService;

class CourseServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('courseService', function()
        {
            return new CourseService();
        });
    }

}