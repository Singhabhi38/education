<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/20/2016
 * Time: 6:25 PM
 */

namespace App\Product\Exception;

Class DAOException extends \Exception{

    public function __construct($msg = ''){
        $this->message = $msg;
    }


}