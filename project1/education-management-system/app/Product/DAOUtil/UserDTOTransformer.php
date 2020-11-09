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

class UserDTOTransformer implements IDTOTransformer{

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

        if(isset($dto->email)){
            $result['email'] = $dto->email;
        }

        if(isset($dto->password)){
            $result['password'] = isset($dto->password)? $this->encrypt($dto->password) : null;
        }

        if(isset($dto->createdAt)){
            $result['created_at_np'] = $this->convertToBS($dto->createdAt);
        }

        if(isset($dto->updatedAt)){
            $result['updated_at_np'] = $this->convertToBS($dto->updatedAt);
        }

        if(isset($dto->emailVerificationCode)){
            $result['email_verification_code'] = $dto->emailVerificationCode;
        }

        if(isset($dto->status)){
            $result['status'] = $dto->status;
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
        $result['name'] = isset($databaseRow->name) ? $databaseRow->name : 'User';
        $result['email'] = isset($databaseRow->email)? $databaseRow->email : null;
        $result['status'] = isset($databaseRow->status)? $databaseRow->status : null;
        $result['createdAt'] = isset($databaseRow->created_at) ? $databaseRow->created_at : null;
        $result['createdAtNp'] = isset($databaseRow->created_at) ? $this->convertToBS($databaseRow->created_at) : null;
        $result['updatedAt'] = isset($databaseRow->updated_at)? $databaseRow->updated_at : null;
        $result['emailVerificationCode'] = isset($databaseRow->email_verification_code)? $databaseRow->email_verification_code : null;
        $result['rememberToken'] = null;
        $result['password'] = null;
        return $result;
    }

}