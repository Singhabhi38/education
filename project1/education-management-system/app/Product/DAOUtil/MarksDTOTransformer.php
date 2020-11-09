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

class MarksDTOTransformer implements IDTOTransformer{

    use NepaliDateConvertible;
    

    /*
     * Transforming data coming from the front end and Service to savable object
     */
    public function formatDataToDb($dto){
        if(is_array($dto)){
            $dto = (object) $dto;
        }

        $result = array();

        if(isset($result['id'])){
            $result['id'] = $dto->id;
        }

        if(isset($dto->exam_id)){
            $result['exam_id'] = $dto->exam_id;
        }

        if(isset($dto->user_id)){
            $result['user_id'] = $dto->user_id;
        }

        if(isset($dto->name)){
            $result['name'] = $dto->name;
        }

        if(isset($dto->remarks)){
            $result['remarks'] = $dto->remarks;
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
        $result['name'] = isset($databaseRow->name) ? $databaseRow->name : null;
        $result['exam_id'] = isset($databaseRow->exam_id) ? $databaseRow->exam_id : null;
        $result['user_id'] = isset($databaseRow->user_id) ? $databaseRow->user_id : null;
        $result['remarks'] = isset($databaseRow->remarks) ? $databaseRow->remarks : null;
        
        
        return $result;
    }

}