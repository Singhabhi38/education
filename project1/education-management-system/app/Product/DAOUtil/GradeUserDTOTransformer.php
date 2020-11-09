<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/3/2016
 * Time: 7:31 PM
 */

namespace App\Product\DAOUtil;
use App\Product\DAOUtil\IDTOTransformer;
use App\Product\ProductTrait\DateTime\NepaliDateConvertible;
use App\Product\ProductTrait\Password\EncryptPassword;

class GradeUserDTOTransformer implements IDTOTransformer{

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

        if(isset($dto->userId)){
            $result['user_id'] = $dto->userId;
        }

        if(isset($dto->gradeId)){
            $result['grade_id'] = $dto->gradeId;
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
        $result['gradeId'] = isset($databaseRow->grade_id) ? $databaseRow->grade_id :null;
        $result['userId'] = isset($databaseRow->user_id) ? $databaseRow->user_id :null;
        $result['createdAt'] = isset($databaseRow->created_at) ? $databaseRow->created_at :null;
        $result['updatedAt'] = isset($databaseRow->updated_at) ? $databaseRow->updated_at :null;
        return $result;
    }

}