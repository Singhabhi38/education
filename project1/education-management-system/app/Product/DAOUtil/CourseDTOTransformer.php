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

class CourseDTOTransformer implements IDTOTransformer{

    use NepaliDateConvertible;
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
        if(isset($dto->name)){
            $result['name'] = $dto->name;
        }
        if(isset($dto->room_id)){
            $result['room_id'] = $dto->room_id;
        }
        if(isset($dto->grade_id)){
            $result['grade_id'] = $dto->grade_id;
        }

        if(isset($dto->practical_marks)){
            $result['practical_marks'] = $dto->practical_marks;
        }

        if(isset($dto->practical)){
            $result['practical'] = $dto->practical;
        }

        if(isset($dto->theory_marks)){
            $result['theory_marks'] = $dto->theory_marks;
        }

        if(isset($dto->theory)){
            $result['theory'] = $dto->theory;
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
        $result = array();
        $result['id'] = isset($databaseRow->id) ? $databaseRow->id : '';
        $result['name'] = isset($databaseRow->name) ? $databaseRow->name : null;
        $result['roomId'] = isset($databaseRow->room_id)? $databaseRow->room_id : null;
        $result['gradeId'] = isset($databaseRow->grade_id)? $databaseRow->grade_id : null;
        $result['practical_marks'] = isset($databaseRow->practical_marks)? $databaseRow->practical_marks : null;
        $result['theory_marks'] = isset($databaseRow->theory_marks)? $databaseRow->theory_marks : null;
        $result['theory'] = isset($databaseRow->theory)? $databaseRow->theory : null;
        $result['practical'] = isset($databaseRow->practical)? $databaseRow->practical : null;
        return $result;
    }

}