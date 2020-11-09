<?php
namespace App\Product\DAO;

use App\CourseModel;
use App\Product\DAOUtil\GradeDTOTransformer;
use App\UserModel;
use App\CourseUserModel;
use App\Product\DAOUtil\CourseDTOTransformer;
use App\Product\DAOUtil\CourseUserDTOTransformer;
use App\Product\Response\ResponseGenerator;
use App\Product\Exception\DAOException;
use App\Product\DAOUtil\UserDTOTransformer;
use Faker;

Class CourseDAO implements ICourseDAO{

    private $USERS_STR = 'users';
    private $GRADE_STR = 'grade';

    private $courseDTOTransformer;
    private $courseUserDTOTransformer;
    private $userDTOTransformer;
    private $gradeDTOTransformer;

    public function __construct(){
        $this->courseDTOTransformer = new CourseDTOTransformer();
        $this->courseUserDTOTransformer = new CourseUserDTOTransformer();
        $this->userDTOTransformer = new UserDTOTransformer();
        $this->gradeDTOTransformer = new GradeDTOTransformer();
    }

    public function findAll($columns){
        $courses = CourseModel::all();
        $result = array();
        if($courses != null){
            foreach($courses as $course){
                $result[] = $this->courseDTOTransformer->formatDataFromDb($course);
            }
        }else{
            throw new DAOException("Error fetching all Course!");
        }

        return $result;
    }

    public function findById($id,$columns){
        $course = CourseModel::with('users')->with('grade')->find($id);
        $attachedEntities = $this->attachRelatedEntitiesByFormatting($course);
        if($course != null){
            $course = $this->courseDTOTransformer->formatDataFromDb($course);
            $course[$this->USERS_STR] = $attachedEntities[$this->USERS_STR];
            $course[$this->GRADE_STR] = $attachedEntities[$this->GRADE_STR];
        }else{
            throw new DAOException("Error fetching Course with id:".$id." !");
        }
        return $course;
    }

    public function findByIds($coursesIDs,$columns){
        $courses = CourseModel::whereIn('id',$coursesIDs)->get();
        if($courses != null){
            foreach($courses as $course){
                $result[] = $this->courseDTOTransformer->formatDataFromDb($course);
            }
        }else{
            throw new DAOException("Error fetching all Course!");
        }
        return $result;
    }

    public function create($course){
        $result = $this->courseDTOTransformer->formatDataToDb($course);
        unset($result->id); // As we are inserting new record we need to remove any ID
        $insertedCourseModel = CourseModel::create($result);
        return $this->courseDTOTransformer
            ->formatDataFromDb(
                $insertedCourseModel
            );
    }

    public function update($course){
        $transformedCourseEntity = $this->courseDTOTransformer->formatDataToDb($course);
        CourseModel::where('id','=',$course['id'])
            ->update($transformedCourseEntity);
        return $this->courseDTOTransformer->formatDataFromDb($transformedCourseEntity);
    }

    public function deleteById($id){
        $course = CourseModel::where('id','=',$id)->delete();
        if($course == null){
            throw new DAOException("Error deleting a Course!");
        }
        return null;
    }

    public function deleteByIds($ids){
        $courses = CourseModel::whereIn('id',$ids)->delete();
        if($courses == null){
            throw new DAOException("Error deleting all Courses!");
        }
        return null;
    }

    public function assignCourseToUser($mappingData){
        $courseUser = $this->courseUserDTOTransformer->formatDataToDb($mappingData);
        //CourseUserModel::where('user_id', $courseUser['user_id'])->delete();
        $insertedCourseUserModel = CourseUserModel::create($courseUser);
        $result = null;
        if($insertedCourseUserModel != null){
            $newCourseUserModel = CourseUserModel::find($insertedCourseUserModel['id']);
            $result = $this->courseUserDTOTransformer->formatDataFromDb($newCourseUserModel);
        }else{
            throw new DAOException("Error Assigning User to particular Grade.");
        }
        return $result;
    }

    public function attachRelatedEntitiesByFormatting($course){
        $result = array();

        $courseUsers = $course->users()->get();
        if(null != $courseUsers && !empty($courseUsers)){
            $result[$this->USERS_STR] = array();
            foreach($courseUsers as $userCourse){
                $result[$this->USERS_STR][] = $this->userDTOTransformer->formatDataFromDb($userCourse);
            }
        }

        $courseGrade = $course->grade()->get();
        if(null != $courseGrade && !empty($courseGrade)){
            $result[$this->GRADE_STR] = $this->gradeDTOTransformer->formatDataFromDb($courseGrade);
        }
        return $result;
    }

}