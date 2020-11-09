<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/3/2016
 * Time: 7:31 PM
 */

namespace  App\Product\DAOUtil;
use App\Product\DAOUtil\IDTOTransformer;
use App\Product\ProductTrait\DateTime\NepaliDateConvertible;
use App\Product\ProductTrait\Password\EncryptPassword;

class GradeDTOTransformer implements IDTOTransformer{

    use NepaliDateConvertible;
    use EncryptPassword;

    /*
     * Transforming data coming from the front end and Service to savable object
     */
    public function formatDataToDb($dto){
        if(is_array($dto)){
            $dto = (object) $dto;
        }

        if(isset($result['id'])){
            $result['id'] = $dto->id;
        }

        if(isset($dto->name)){
            $result['name'] = $dto->name;
        }

        if(isset($dto->short_name)){
            $result['short_name'] = $dto->short_name;
        }

        if(isset($dto->section)){
            $result['section'] = $dto->section;
        }

        if(isset($dto->year)){
            $result['year'] = $dto->year;
        }

        if(isset($dto->semester)){
            $result['semester'] = $dto->semester;
        }

        if(isset($dto->trimester)){
            $result['trimester'] = $dto->trimester;
        }

        if(isset($dto->month)){
            $result['month'] = $dto->month;
        }
        return $result;
    }

    /*
     * Transforming the database rows coming directly from Database to a object
     */
    public function formatDataFromDb($databaseRow){
        if(is_array($databaseRow)){
            $databaseRow = (object) $databaseRow;
        }

        $result = array();

        $result['id'] = isset($databaseRow->id) ? $databaseRow->id : null;

        $result['name'] = isset($databaseRow->name) ? $databaseRow->name :null;

        $result['shortName'] = isset($databaseRow->short_name)? $databaseRow->short_name : null;

        $result['section'] = isset($databaseRow->section)? $databaseRow->section : null;

        $result['displayName'] = $result['shortName'].' '.$result['section'];
        $result['displayName'] =

        $result['year'] = isset($databaseRow->year)? $databaseRow->year : null;

        $result['semester'] = isset($databaseRow->semester)? $databaseRow->semester : null;

        $result['trimester'] = isset($databaseRow->trimester)? $databaseRow->trimester : null;

        $result['month'] = isset($databaseRow->month)? $databaseRow->month : null;

        $result['createdAt'] = isset($databaseRow->created_at) ? $databaseRow->created_at : null;

        $result['createdAtNp'] = isset($databaseRow->created_at) ? $this->convertToBS($databaseRow->created_at) : null;

        $result['updatedAt'] = isset($databaseRow->updated_at)? $databaseRow->updated_at : null;

        return $result;
    }

}