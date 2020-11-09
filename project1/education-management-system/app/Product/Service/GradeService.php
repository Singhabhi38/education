<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/11/2016
 * Time: 8:19 PM
 */

namespace App\Product\Service;
use App\Product\DAO\GradeDAO;
use App\Facades\ResponseGenerator;


Class GradeService implements IGradeService{

    private $gradeDAO;

    public function __construct(GradeDAO $gradeDAO){
        $this->gradeDAO = $gradeDAO;
    }

    public function findAll($request){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $grades = $this->gradeDAO->findAll(array());
            ResponseGenerator::setData($responseDTO,$grades);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Grade-*"); // Means Sending Response with * grades
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Grade"); // Means Sending Response with no grades
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $grade = $this->gradeDAO->findById($id, array());
            ResponseGenerator::setData($responseDTO,$grade);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Grade-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Grade");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $grade = $this->gradeDAO->findByIds($ids, array());
            ResponseGenerator::setData($responseDTO,$grade);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Grade-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Grade");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function create($request){

        $grades = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $grades = $this->gradeDAO->create($grades);
            ResponseGenerator::setData($responseDTO,$grades);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Grades-Created-1");
        }catch(\Exception $e) {
            throw $e;
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Grades-Created");
        }
        return ResponseGenerator::getResponse($responseDTO);


    }

    public function update($request,$id){
        $grade = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $grade = $this->gradeDAO->update($grade);
            ResponseGenerator::setData($responseDTO,$grade);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Grade-Updated-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Grade-Updated");
        }
        return ResponseGenerator::getResponse($responseDTO);

    }

    public function deleteById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $grade = $this->gradeDAO->deleteById($id);
            ResponseGenerator::setData($responseDTO,$grade);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Grade-Deleted-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Grade-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);

    }

    public function deleteByIds($request,$ids){}

    public function assignGradeToUser($request){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $newMapping = $request->all();
            $grades = $this->gradeDAO->assignGradeToUser($newMapping);
            ResponseGenerator::setData($responseDTO,$grades);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Assign-Grade-*"); // Means Sending Response with * grades
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Assign-Grade"); // Means Sending Response with no grades
        }
        return ResponseGenerator::getResponse($responseDTO);
    }
}