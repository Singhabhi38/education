<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/11/2016
 * Time: 8:17 PM
 */

namespace App\Product\DAO;
use App\GradeUserModel;
use App\GradeModel;
use App\Product\DAOUtil\GradeDTOTransformer;
use App\Product\DAOUtil\GradeUserDTOTransformer;
use App\Product\DAOUtil\CourseDTOTransformer;
use App\Product\DAOUtil\UserDTOTransformer;

Class GradeDAO implements IGradeDAO{
    private $USERS_STR = 'users';
    private $COURSES_STR = 'courses';
    private $gradeDTOTransformer;
    private $gradeUserDTOTransformer;
    private $userDTOTransformer;
    private $courseDTOTransformer;

    public function __construct(){
        $this->gradeDTOTransformer = new GradeDTOTransformer();
        $this->gradeUserDTOTransformer = new GradeUserDTOTransformer();
        $this->userDTOTransformer = new UserDTOTransformer();
        $this->courseDTOTransformer = new CourseDTOTransformer();
    }


    public function create($grade){
      $result = $this->gradeDTOTransformer->formatDataToDb($grade);
        unset($result->id); // As we are inserting new record we need to remove any ID that may have come from frontends or services
        $insertedgradeModel = GradeModel::create($result);
        return $this->gradeDTOTransformer
            ->formatDataFromDb(
                $insertedgradeModel
            );
	}

    public function update($grade){
        $transformedGradeEntity = $this->gradeDTOTransformer->formatDataToDb($grade);
        GradeModel::where('id','=',$grade['id'])
            ->update($transformedGradeEntity);
        return $this->gradeDTOTransformer->formatDataFromDb($transformedGradeEntity);
    }

    public function deleteById($id){
        $grade = GradeModel::where('id','=',$id)->delete();
        if($grade == null){
            throw new DAOException("Error deleting grade with given IDs!");
        }
        return null;
    }

    public function deleteByIds($ids){}


    public function findAll($columns){
        $grades = GradeModel::all();
        $result = array();
        if($grades != null){
            foreach($grades as $key => $grade){
                $attachedEntities = $this->attachRelatedEntitiesByFormatting($grade);
                $result[] = $this->gradeDTOTransformer->formatDataFromDb($grade);
            }
        }else{
            throw new DAOException("Error fetching all Grades!");
        }
        return $result;
    }

    public function findById($id,$columns){
        $grade = GradeModel::with('users')->with('courses')->find($id);
        $attachedEntities = $this->attachRelatedEntitiesByFormatting($grade);
        if($grade != null){
            $grade = $this->gradeDTOTransformer->formatDataFromDb($grade);
            $grade[$this->USERS_STR] = $attachedEntities[$this->USERS_STR];
            $grade[$this->COURSES_STR] = $attachedEntities[$this->COURSES_STR];
        }else{
            throw new DAOException("Error fetching Grade with id:".$id." !");
        }
        return $grade;
    }

    public function findByIds($ids,$columns){
        $grades = UserModel::whereIn('id',$ids)->get();
        if($grades != null){
            $result = array();
            foreach($grades as $key => $grade){
                $result[$key] = $this->userDTOTransformer->formatDataFromDb($grade);
            }
        }else{
            throw new DAOException("Error fetching all Grades!");
        }
        return $result;
    }

    public function assignGradeToUser($mappingData){
        $gradeUser = $this->gradeUserDTOTransformer->formatDataToDb($mappingData);
        GradeUserModel::where('user_id', $gradeUser['user_id'])->delete();
        $insertedGradeUserModel = GradeUserModel::create($gradeUser);
        $result = null;
        if($insertedGradeUserModel != null){
            $newGradeUserModel = GradeUserModel::find($insertedGradeUserModel['id']);
            $result = $this->gradeUserDTOTransformer->formatDataFromDb($newGradeUserModel);
        }else{
            throw new DAOException("Error Assigning User to particular Grade.");
        }
        return $result;
    }

    public function attachRelatedEntitiesByFormatting($grade){
        $result = array();
        $userGrades = $grade->users()->get();
        if(null != $userGrades && !empty($userGrades)){
            $result[$this->USERS_STR] = array();
            foreach($userGrades as $userGrade){
                $result[$this->USERS_STR][] = $this->userDTOTransformer->formatDataFromDb($userGrade);
            }
        }
        $courseGrades = $grade->courses()->get();
        if(null != $courseGrades && !empty($courseGrades)){
            $result[$this->COURSES_STR] = array();
            foreach($courseGrades as $courseGrade){
                $result[$this->COURSES_STR][] = $this->courseDTOTransformer->formatDataFromDb($courseGrade);
            }
        }
        return $result;
    }

}
