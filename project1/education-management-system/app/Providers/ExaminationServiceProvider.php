<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\service\ExaminationService;

class ExaminationServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('examinationService', function()
        {
            return new ExaminationService();
        });
    }

}