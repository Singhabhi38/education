<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\service\MarksService;

class MarksServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('marksService', function()
        {
            return new MarksService();
        });
    }

}