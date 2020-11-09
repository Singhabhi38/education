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

class RoleDTOTransformer implements IDTOTransformer{

//    use NepaliDateConvertible;

    /*
     * Transforming data coming from the front end and Service to savable object
     */
    public function formatDataToDb($dto){
        if(is_array($dto)){
            $dto = (object) $dto;
        }

        $result = Array();

        if(isset($dto->id)){
            $result['id'] = $dto->id;
        }

        if(isset($dto->name)){
            $result['name'] = $dto->name;
        }


        if(isset($dto->display_name)){
            $result['display_name'] = $dto->display_name;
        }

        if(isset($dto->description)){
            $result['description'] = $dto->description;
        }
        return $result;
    }

    /*
     * Transforming the database rows to a object
     */
    public function formatDataFromDb($databaseRow){
        if(is_array($databaseRow)){
            $databaseRow = (object) $databaseRow;
        }
        $result['id'] = isset($databaseRow->id) ? $databaseRow->id: null;
        $result['name'] = isset($databaseRow->name) ? $databaseRow->name : null;
        $result['displayName'] = isset($databaseRow->display_name) ? $databaseRow->display_name : null;
        $result['description'] = isset($databaseRow->description) ? $databaseRow->description : null;
        return $result;
    }

}