<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\Service\RoomService;

class RoomServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('roomService', function()
        {
            return new RoomService();
        });
    }

}