<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\service\UserService;

class UserServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('userService', function()
        {
            return new UserService();
        });
    }

}