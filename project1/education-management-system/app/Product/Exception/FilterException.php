<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 9/3/2016
 * Time: 11:42 AM
 */

namespace App\Product\Exception;


class FilterException extends \Exception{
    public function __construct($msg = ''){
        $this->message = $msg;
    }
}