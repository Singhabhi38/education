<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\DAO\RoomDAO;

class RoomDAOProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('roomDAO', function()
        {
            return new RoomDAO();
        });
    }

}