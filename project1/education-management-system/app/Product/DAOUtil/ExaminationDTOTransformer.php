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

class ExaminationDTOTransformer implements IDTOTransformer{
    use NepaliDateConvertible;

    /*
     * Transforming data coming from the front end and Service to savable array
     */
    public function formatDataToDb($dto){
        if(is_array($dto)){
            $dto = (object) $dto;
        }

        if(isset($dto->id)){
            $result['id'] = $dto->id;
        }

        if(isset($dto->name)){
            $result['name'] = $dto->name;
        }

        if(isset($dto->grade_id)){
            $result['grade_id'] = $dto->grade_id;
        }

        if(isset($dto->course_id)){
            $result['course_id'] = $dto->course_id;
        }

        if(isset($dto->room_id)){
            $result['room_id'] = $dto->room_id;
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
        $result['id'] = isset($databaseRow->id) ? $databaseRow->id : null;
        $result['name'] = isset($databaseRow->name) ? $databaseRow->name : null;
        $result['grade_id'] = isset($databaseRow->grade_id) ? $databaseRow->grade_id : null;
        $result['course_id'] = isset($databaseRow->course_id) ? $databaseRow->course_id : null;
        $result['room_id'] = isset($databaseRow->room_id) ? $databaseRow->room_id : null;
        $result['createdAtNp'] = isset($databaseRow->created_at) ? $this->convertToBS($databaseRow->created_at) : null;
        return $result;
    }
}