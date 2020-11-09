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
use Carbon\Carbon;

class AttendanceDTOTransformer implements IDTOTransformer{

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

        if(isset($dto->userId)){
            $result['user_id'] = $dto->userId;
        }

        if(isset($dto->in_or_out)){
            $result['in_or_out'] = $dto->in_or_out;
        }

        if(isset($dto->comment)){
            $result['comment'] = $dto->comment;
        }

        if(isset($dto->gradeId)){
            $result['grade_id'] = $dto->gradeId;
        }

        if(isset($dto->courseId)){
            $result['course_id'] = $dto->courseId;
        }

        if(isset($dto->createdAt)){
            $nepaliDate = $this->convertToBS($dto->createdAt);
            $result['year_np'] = $nepaliDate['Y'];
            $result['month_np'] = $nepaliDate['n'];
            $result['month_name_np'] = $nepaliDate['F'];
            $result['day_np'] = $nepaliDate['d'];
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

        $result['id'] = isset($databaseRow->id) ? $databaseRow->id : null;
        $result['userId'] = isset($databaseRow->user_id) ? $databaseRow->user_id : null;
        $result['in_or_out'] = isset($databaseRow->in_or_out) ? $databaseRow->in_or_out : null;
        $result['comment'] = isset($databaseRow->comment)? $databaseRow->comment : null;
        $result['createdAt'] = isset($databaseRow->created_at) ? $databaseRow->created_at : null;

        $result['yearNP'] = isset($databaseRow->year_np) ? $databaseRow->year_np : null;
        $result['monthNP'] = isset($databaseRow->month_np) ? $databaseRow->month_np : null;
        $result['dayNP'] = isset($databaseRow->day_np) ? $databaseRow->day_np : null;
        $result['monthNPName'] = isset($databaseRow->month_name_np) ? $databaseRow->month_name_np : null;

        $result['nepaliDate'] = $result['yearNP'] .'-'. $result['monthNP'] . '-' . $result['dayNP'] ;

        $result['gradeId'] = isset($databaseRow->grade_id) ? $databaseRow->grade_id : null;
        $result['courseId'] = isset($databaseRow->course_id) ? $databaseRow->course_id : null;

        $result['updatedAt'] = isset($databaseRow->updated_at)? $databaseRow->updated_at : null;
        $result['updatedAtHuman'] = isset($databaseRow->updated_at)? $databaseRow->updated_at->diffForHumans(): null;
        return $result;
    }

}