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

class AddressDTOTransformer implements IDTOTransformer{

    use NepaliDateConvertible;

    /*
     * Transforming data coming from the front end and Service to savable object
     */
    public function formatDataToDb($dto){
        if(is_array($dto)){
            $dto = (object) $dto;
        }

        if(isset($dto->id)){
            $result['id'] = $dto->id;
        }

        if(isset($dto->address)){
            $result['address'] = $dto->address;
        }

        if(isset($dto->zone)){
            $result['zone'] = $dto->zone;
        }

        if(isset($dto->district)){
            $result['district'] = $dto->district;
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
        $result['id'] = isset($databaseRow->id) ? $databaseRow->id : '';
        $result['address'] = isset($databaseRow->address) ? $databaseRow->address : null;
        $result['zone'] = isset($databaseRow->zone)? $databaseRow->zone : null;
        $result['district'] = isset($databaseRow->district)? $databaseRow->district : null;
        $result['createdAtNp'] = isset($databaseRow->created_at) ? $this->convertToBS($databaseRow->created_at) : null;
        $result['updatedAt'] = isset($databaseRow->updated_at)? $databaseRow->updated_at : null;
        $result['rememberToken'] = null;
    
        return $result;
    }

}