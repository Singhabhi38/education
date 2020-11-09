<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product\DAO\ExaminationDAO;

class ExaminationDAOProvider extends ServiceProvider {

    public function register(){
        $this->app->singleton('examinationDAO', function()
        {
            return new ExaminationDAO();
        });
    }

}