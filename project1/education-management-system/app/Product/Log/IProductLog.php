<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/3/2016
 * Time: 7:14 PM
 */

namespace App\Log;

use \PHP_Token_CLASS_NAME_CONSTANT;
use \Exception;

interface IProductLog{
    public function info($message = null);

    public function error(Exception $exception, $message = null);
}