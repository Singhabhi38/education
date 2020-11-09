<?php

namespace App\Providers;

use App\Product\Response\ResponseGeneratorImpl;
use Illuminate\Support\ServiceProvider;


class ResponseGeneratorProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('ResponseGenerator', function()
        {
            return new ResponseGeneratorImpl();
        });
    }

}