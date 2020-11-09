<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/1/2016
 * Time: 6:57 PM
 */

namespace App\Product\Service;
use App\Facades\ResponseGenerator;
use App\Product\DAO\ScheduleDAO;
use Illuminate\Support\Facades\Auth;

Class ScheduleService implements IScheduleService{

    private $scheduleDAO;

    public function __construct(ScheduleDAO $sDAO){
        $this->scheduleDAO = $sDAO;
    }

    public function findAll($request){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $schedule = $this->scheduleDAO->findAll(array());
            ResponseGenerator::setData($responseDTO,$schedule);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Schedule-*"); // Means Sending Response with * schedules
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Schedule"); // Means Sending Response with no schedules
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $schedule = $this->scheduleDAO->findById($id, array());
            ResponseGenerator::setData($responseDTO,$schedule);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Schedule-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Schedule");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $schedules = $this->scheduleDAO->findByIds($ids, array());
            ResponseGenerator::setData($responseDTO,$schedules);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Schedules-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Schedules");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function create($request){
        $schedule = $request->all();
        $schedule['createdBy'] = Auth::user()->id;
        $schedule['updatedBy'] = Auth::user()->id;
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $schedule = $this->scheduleDAO->create($schedule);
            ResponseGenerator::setData($responseDTO,$schedule);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Schedule-Created-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Schedule-Created");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function update($request,$id){
        $schedule = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $schedule = $this->scheduleDAO->update($schedule);
            ResponseGenerator::setData($responseDTO,$schedule);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Schedule-Updated-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Schedule-Updated");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $schedule = $this->scheduleDAO->deleteById($id);
            ResponseGenerator::setData($responseDTO,$schedule);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Schedule-Deleted-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Schedule-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $schedules = $this->scheduleDAO->deleteByIds($ids);
            ResponseGenerator::setData($responseDTO,$schedules);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Schedules-Deleted-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Schedules-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }
}