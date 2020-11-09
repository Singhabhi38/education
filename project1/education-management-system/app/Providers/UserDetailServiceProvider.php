<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\service\UserDetailService;

class UserDetailServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('userDetailService', function()
        {
            return new UserDetailService();
        });
    }

}