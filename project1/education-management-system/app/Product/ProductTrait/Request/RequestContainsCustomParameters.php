<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/21/2016
 * Time: 9:39 AM
 */

namespace App\Product\ProductTrait\Request;


trait RequestContainsCustomParameters{

    private $CUSTOM_PARAMETERS_STR = 'customParameters';
    private $ACTION_STR = 'action';

    public function requestHasCustomParameters($request){
       if($request->has($this->CUSTOM_PARAMETERS_STR)){
        return true;
       }
       return false;
    }

    public function getActionFromCustomParameters($request){
        $action = null;
        if($this->requestHasCustomParameters($request)){
            $action = $request->get($this->CUSTOM_PARAMETERS_STR)[$this->ACTION_STR];
        }
        return $action;
    }

}