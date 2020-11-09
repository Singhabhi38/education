<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class ResponseGenerator extends Facade{

    protected static function getFacadeAccessor(){
        return 'ResponseGenerator';
    }

}