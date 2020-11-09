<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 9/3/2016
 * Time: 12:08 PM
 */

namespace App\Product\Filter;


interface IFilter{
    public function filterFromDB();

    public function validateComparisonOperator($op, array $expected);

    public static function getFilterPickList();

    public static function getFilterCacheTTL();
}