<?php
namespace App\Product\DAO;

use App\ExaminationModel;
use App\Product\DAOUtil\ExaminationDTOTransformer;
use App\Product\Response\ResponseGenerator;
use App\Product\Exception\DAOException;
use App\Product\DAOUtil\GradeDTOTransformer;
use App\Product\DAOUtil\CourseDTOTransformer;
use App\Product\DAOUtil\RoomDTOTransformer;


Class ExaminationDAO implements IExaminationDAO{
    private $GRADES_STR = 'grades';
    private $COURSES_STR = 'courses';
    private $ROOMS_STR = 'rooms';

    private $examinationDTOTransformer;
    private $gradeDTOTransformer;
    private $courseDTOTransformer;
    private $roomDTOTransformer;

    public function __construct()
    {
        $this->examinationDTOTransformer = new examinationDTOTransformer();
        $this->gradeDTOTransformer = new GradeDTOTransformer();
        $this->courseDTOTransformer = new CourseDTOTransformer();
        $this->roomDTOTransformer = new RoomDTOTransformer();

    }

    public function findAll($columns){
        $examination = ExaminationModel::all();
        $result = array();
        foreach($examination as $examination){
            array_push($result,$this->examinationDTOTransformer->formatDataFromDb($examination));
        }
        return $result;
    }

    public function findById($id,$columns){
        $examination = ExaminationModel::with('grade')->with('course')->with('room')->find($id);
        $attachedEntities = $this->attachRelatedEntitiesByFormatting($examination);

        if($examination != null){
            $examination = $this->examinationDTOTransformer->formatDataFromDb($examination);
            $user[$this->GRADES_STR] = $attachedEntities[$this->GRADES_STR];
            $user[$this->COURSES_STR] = $attachedEntities[$this->COURSES_STR];
            $user[$this->ROOMS_STR] = $attachedEntities[$this->ROOMS_STR];

        }else{
            throw new DAOException("Error fetching examination with id:".$id." !");
        }
        return $examination;
    }

    public function findByIds($ids,$columns){
        $examination = ExaminationModel::whereIn('id',$ids)->get();
        if($examination != null){
            foreach($examination as $examination){
                $result[] = $this->examinationDTOTransformer->formatDataFromDb($examination);
            }
        }else{
            throw new DAOException("Error fetching all examination!");
        }
        return $result;
    }

    public function create($examination){
        $result = $this->examinationDTOTransformer->formatDataToDb($examination);
        unset($result->id); // As we are inserting new record we need to remove any ID that may have come from frontends or services
        $insertedexaminationModel = ExaminationModel::create($result);
        return $this->examinationDTOTransformer
            ->formatDataFromDb(
                $insertedexaminationModel
            );
    }

    public function update($examination){
        $transformedexaminationEntity = $this->examinationDTOTransformer->formatDataToDb($examination);
        ExaminationModel::where('id','=',$examination['id'])
                  ->update($transformedexaminationEntity);
        return $this->examinationDTOTransformer->formatDataFromDb($transformedexaminationEntity);
    }

    public function deleteById($id){
         $examination = ExaminationModel::where('id','=',$id)->delete();
        if($examination == null){
            throw new DAOException("Error deleting an Examination!");
        }
        return null;
    }

    public function deleteByIds($ids){
        $examination = ExaminationModel::whereIn('id',$ids)->delete();
        if($examination == null){
            throw new DAOException("Error deleting all examination!");
        }
        return null;
    }

    public function attachRelatedEntitiesByFormatting($examination){
        $result = array();
        /// Attaching Grades if available
        $examinationGrades = $examination->grade()->get();
        if(null != $examinationGrades && !empty($examinationGrades)){
            $result[$this->GRADES_STR] = array();
            foreach($examinationGrades as $examinationGrade){
                // Formatting for Grade associated with the user done here
                $result[$this->GRADES_STR][] = $this->gradeDTOTransformer->formatDataFromDb($examinationGrade);
            }
        }

        $examinationCourses = $examination->course()->get();
        if(null != $examinationCourses && !empty($examinationCourses)){
            $result[$this->COURSES_STR] = array();
            foreach($examinationCourses as $examinationCourse){
                // Formatting for Course associated with the user done here
                $result[$this->COURSES_STR][] = $this->courseDTOTransformer->formatDataFromDb($examinationCourse);
            }
        }

        $examinationRooms= $examination->room()->get();
        if(null != $examinationRooms && !empty($examinationRooms)){
            $result[$this->ROOMS_STR] = array();
            foreach($examinationRooms as $examinationRoom){
                // Formatting for Room associated with the user done here
                $result[$this->ROOMS_STR][] = $this->roomDTOTransformer->formatDataFromDb($examinationRoom);
            }
        }
        return $result;
    }
}