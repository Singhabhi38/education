<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/18/2016
 * Time: 5:16 PM
 */

namespace App\Product\ProductTrait\DateTime;
use App\Vendor\pachabhajiya\nepalidate\AdToBs;


trait NepaliDateConvertible
{
    public function convertToBS($dateInAD){
        $adToBs = new AdToBs($dateInAD);
        $convertedDate = $adToBs->getNepaliDate();
        return $convertedDate;
    }
}