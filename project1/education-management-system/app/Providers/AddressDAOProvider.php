<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\DAO\AddressDAO;

class AddressDAOProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('addressDAO', function()
        {
            return new AddressDAO();
        });
    }

}