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

class UserDetailDTOTransformer implements IDTOTransformer{

    use NepaliDateConvertible;
    use EncryptPassword;

    /*
     * Transforming data coming from the front end and Service to savable object
     */
    public function formatDataToDb($dto){
        if(is_array($dto)){
            $dto = (object) $dto;
        }

        $result = array();

        if(isset($dto->id)){
            $result['id'] = $dto->id;
        }

        if(isset($dto->firstName)){
            $result['first_name'] = $dto->firstName;
        }

        if(isset($dto->lastName)){
            $result['last_name'] = $dto->lastName;
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
        $result['id'] = isset($databaseRow->id) ? $databaseRow->id : '';
        $result['firstName'] = isset($databaseRow->first_name) ? $databaseRow->first_name : null;
        $result['lastName'] = isset($databaseRow->last_name) ? $databaseRow->last_name : null;
        $result['fullName'] = $result['firstName'].' '.$result['lastName'];
        $result['dob'] = isset($databaseRow->dob) ? $databaseRow->dob : null;
        $result['dobNp'] = isset($databaseRow->dob) ? $this->convertToBS($databaseRow->dob) : null;
        $result['createdAt'] = isset($databaseRow->created_at) ? $databaseRow->created_at : null;
        $result['createdAtNp'] = isset($databaseRow->created_at) ? $this->convertToBS($databaseRow->created_at) : null;
        $result['updatedAt'] = isset($databaseRow->updated_at)? $databaseRow->updated_at : null;
        return $result;
    }

}