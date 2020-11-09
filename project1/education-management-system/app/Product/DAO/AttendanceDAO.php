<?php
namespace App\Product\DAO;

use App\AttendanceModel;
use App\Product\DAOUtil\AttendanceDTOTransformer;
use App\Product\Response\ResponseGenerator;
use App\Product\Exception\DAOException;
use Illuminate\Support\Facades\Auth;

Class AttendanceDAO extends BaseDAO implements IAttendanceDAO{

    private $attendanceDTOTransformer;

    public function __construct(){
        $this->attendanceDTOTransformer = new AttendanceDTOTransformer();
    }

    public function findAll($columns){
        $attendances = AttendanceModel::where('id','<','100')->get();
        if($attendances != null){
            foreach($attendances as $attendance){
                $result[] = $this->attendanceDTOTransformer->formatDataFromDb($attendance);
            }
        }else{
            throw new DAOException("Error fetching all Attendances!");
        }
        return $result;
    }

    public function findById($id,$columns){
        $attendance = AttendanceModel::find($id);
        if($attendance != null){
            $attendance = $this->attendanceDTOTransformer->formatDataFromDb($attendance);
        }else{
            throw new DAOException("Error fetching Attendance with id:".$id." !");
        }
        return $attendance;
    }

    public function findByIds($ids,$columns){
        $attendances = AttendanceModel::whereIn('id',$ids)->get();
        if($attendances!= null){
            foreach($attendances as $attendance){
                $result[] = $this->attendanceDTOTransformer->formatDataFromDb($attendance);
            }
        }else{
            throw new DAOException("Error fetching Attendances!");
            }
        return $result;
             
    }

    public function create($attendance){
        $attendance = $this->assignUpdatedAtToCurrentDate($attendance);
        $attendance = $this->assignCreatedAtToCurrentDate($attendance);
        $result = $this->attendanceDTOTransformer->formatDataToDb($attendance);
       // $result['created_by'] = Auth::user()->id;
        unset($result['id']);
        $insertedAttendanceModel = AttendanceModel::create($result);
        return $this->attendanceDTOTransformer
                    ->formatDataFromDb(
                        $insertedAttendanceModel
                    );
    }

    public function update($attendance){
        $transformedAttendanceEntity = $this->attendanceDTOTransformer->formatDataToDb($attendance);
        AttendanceModel::where('id','=',$attendance['id'])
                  ->update($transformedAttendanceEntity);
        return $this->attendanceDTOTransformer->formatDataFromDb($transformedAttendanceEntity);
    }


    public function deleteById($id){
        $attendance = AttendanceModel::where('id','=',$id)->delete();
        if($attendance == null){
            throw new DAOException("Error deleting an Attendance!");
        }
        return null;
    }

    public function deleteByIds($ids){
        $attendances = AttendanceModel::whereIn('id',$ids)->delete();
        if($attendances == null){
            throw new DAOException("Error deleting all Attendances!");
        }
        return null;
    }
}