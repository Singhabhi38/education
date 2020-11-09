<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/3/2016
 * Time: 7:29 PM
 */
namespace App\Product\DAOUtil;

interface IDTOTransformer{

    public function formatDataToDb($dto);

    public function formatDataFromDb($databaseRow);

}