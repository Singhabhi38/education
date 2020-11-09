<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\Service\AddressService;

class AddressServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('addressService', function()
        {
            return new AddressService();
        });
    }

}