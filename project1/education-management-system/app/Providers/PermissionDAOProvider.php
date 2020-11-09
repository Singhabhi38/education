<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\DAO\PermissionDAO;

class PermissionDAOProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('permissionDAO', function()
        {
            return new PermissionDAO();
        });
    }

}