<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\dao\UserDAO;

class UserDAOProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('userDAO', function()
        {
            return new UserDAO();
        });
    }

}