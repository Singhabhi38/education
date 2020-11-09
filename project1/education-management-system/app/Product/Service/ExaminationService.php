<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/1/2016
 * Time: 6:57 PM
 */

namespace App\Product\Service;
use App\Facades\ResponseGenerator;
use App\Product\DAO\ExaminationDAO;

Class ExaminationService implements IExaminationsService{

    private $examinationDAO;

    public function __construct(ExaminationDAO $eDAO){
        $this->examinationDAO = $eDAO;
    }

    public function findAll($request){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $examinations = $this->examinationDAO->findAll(array());
            ResponseGenerator::setData($responseDTO,$examinations);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Examinations-*"); // Means Sending Response with * examinations
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Examinations"); // Means Sending Response with no examinations
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $examinations = $this->examinationDAO->findById($id, array());
            ResponseGenerator::setData($responseDTO,$examinations);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Examinations-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Examinations");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $examinations = $this->examinationDAO->findByIds($ids, array());
            ResponseGenerator::setData($responseDTO,$examinations);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Examinations-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Examinations");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function create($request){
        $examinations = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $examinations = $this->examinationDAO->create($examinations);
            ResponseGenerator::setData($responseDTO,$examinations);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Examinations-Created-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Examinations-Created");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function update($request,$id){
        $examinations = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $examinations = $this->examinationDAO->update($examinations);
            ResponseGenerator::setData($responseDTO,$examinations);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Examinations-Updated-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Examinations-Updated");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $examinations = $this->examinationDAO->deleteById($id);
            ResponseGenerator::setData($responseDTO,$examinations);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Examinations-Deleted-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Examinations-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $examinations = $this->examinationDAO->deleteByIds($ids);
            ResponseGenerator::setData($responseDTO,$examinations);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Examinations-Deleted-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Examinations-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }
}