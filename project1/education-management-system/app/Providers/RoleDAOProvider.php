<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\DAO\RoleDAO;

class RoleDAOProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('roleDAO', function()
        {
            return new RoleDAO();
        });
    }

}