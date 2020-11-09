<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\Service\GradeService;

class GradeServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('gradeService', function()
        {
            return new GradeService();
        });
    }

}