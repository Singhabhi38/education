<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\service\PermissionService;

class PermissionServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('permissionService', function()
        {
            return new PermissionService();
        });
    }

}