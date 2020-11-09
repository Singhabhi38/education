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

class PermissionDTOTransformer implements IDTOTransformer{
    use NepaliDateConvertible;
    use EncryptPassword;

    /*
     * Transforming data coming from the front end and Service to savable array
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
        return $result;
    }


    /*
     * Transforming the database rows coming directly from Database to a array
     */
    public function formatDataFromDb($databaseRow){
        if(is_array($databaseRow)){
            $databaseRow = (object) $databaseRow;
        }
        $result['name'] = isset($databaseRow->name) ? $databaseRow->name : null;
        $result['createdAtNp'] = isset($databaseRow->created_at) ? $this->convertToBS($databaseRow->created_at) : null;
        return $result;
    }
}