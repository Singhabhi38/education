<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\dao\MarksDAO;

class MarksDAOProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('marksDAO', function()
        {
            return new MarksDAO();
        });
    }

}