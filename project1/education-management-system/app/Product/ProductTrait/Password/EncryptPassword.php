<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/21/2016
 * Time: 10:05 AM
 */

namespace App\Product\ProductTrait\Password;


trait EncryptPassword{
    public function encrypt($value){
        return bcrypt($value);
    }
}