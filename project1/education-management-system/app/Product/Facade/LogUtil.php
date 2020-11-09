<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class LogUtil extends Facade{

    protected static function getFacadeAccessor(){
        return 'LogUtil';
    }

}