<?php

namespace App\Providers;

use App\Product\Service\RoleService;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('roleService', function()
        {
            return new RoleService();
        });
    }

}