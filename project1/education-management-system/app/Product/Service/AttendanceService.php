<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/1/2016
 * Time: 6:57 PM
 */

namespace App\Product\Service;

use App\Facades\ResponseGenerator;
use App\Product\DAO\AttendanceDAO;

Class AttendanceService implements IAttendanceService{

    private $attendanceDAO;

    public function __construct(AttendanceDAO $aDAO){
            $this->attendanceDAO = $aDAO;
    }

    public function findAll($request){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $attendances = $this->attendanceDAO->findAll(array());
            ResponseGenerator::setData($responseDTO,$attendances);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Attendance-*"); // Means Sending Response with * attendances
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Attendance"); // Means Sending Response with no attendances
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findById($request,$Id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $attendance = $this->attendanceDAO->findById($Id, array());
            ResponseGenerator::setData($responseDTO,$attendance);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Attendance-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Attendance");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $attendance = $this->attendanceDAO->findByIds($ids, array());
            ResponseGenerator::setData($responseDTO,$attendance);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Attendance-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Attendance");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function create($request){
        $attendance = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $attendance = $this->attendanceDAO->create($attendance);
            ResponseGenerator::setData($responseDTO,$attendance);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Attendance-Created-1");
        }catch(\Exception $e) {
            throw $e;
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Attendance-Created");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function update($request,$id){
        $attendance = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $attendance = $this->attendanceDAO->update($attendance);
            ResponseGenerator::setData($responseDTO,$attendance);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Attendance-Updated-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Attendance-Updated");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $attendance = $this->attendanceDAO->deleteById($id);
            ResponseGenerator::setData($responseDTO,$attendance);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Attendance-Deleted-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Attendance-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $attendance = $this->attendanceDAO->deleteByIds($ids);
            ResponseGenerator::setData($responseDTO,$attendance);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Attendance-Deleted-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Attendance-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }
}