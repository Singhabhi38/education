<?php
namespace App\Product\DAOUtil;
use App\Product\DAOUtil\IDTOTransformer;
use App\Product\ProductTrait\DateTime\NepaliDateConvertible;
use App\Product\ProductTrait\Password\EncryptPassword;

class RoleUserDTOTransformer implements IDTOTransformer{

    use NepaliDateConvertible;
    use EncryptPassword;

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

        if(isset($dto->roleId)){
            $result['role_id'] = $dto->roleId;
        }

        if(isset($dto->userId)){
            $result['user_id'] = $dto->userId;
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
        $result['userId'] = isset($databaseRow->user_id) ? $databaseRow->user_id :null;
        $result['roleId'] = isset($databaseRow->role_id) ? $databaseRow->role_id :null;
        return $result;
    }

} 