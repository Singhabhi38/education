<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 9/3/2016
 * Time: 11:58 AM
 */

namespace App\Product\Service;

interface IFilterService{

    public function filterFromRequest($filterRequest);

}