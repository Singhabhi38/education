<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/1/2016
 * Time: 6:57 PM
 */

namespace App\Product\Service;

use App\Facades\ResponseGenerator;
use App\Product\DAO\MarksDAO;

Class MarksService implements IMarksService{

    private $marksDAO;

    public function __construct(MarksDAO $mDAO){
        $this->marksDAO = $mDAO;
    }

    public function findAll($request){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $marks = $this->marksDAO->findAll(array());
            ResponseGenerator::setData($responseDTO,$marks);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Marks-*"); // Means Sending Response with * marks
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Marks"); // Means Sending Response with no Marks
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findById($request,$Id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $mark = $this->marksDAO->findById($Id, array());
            ResponseGenerator::setData($responseDTO,$mark);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Mark-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Mark");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $mark = $this->marksDAO->findByIds($ids, array());
            ResponseGenerator::setData($responseDTO,$mark);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Mark-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Mark");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function create($request){
        $mark = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $mark = $this->marksDAO->create($mark);
            ResponseGenerator::setData($responseDTO,$mark);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Marks-Created-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Marks-Created");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function update($request,$id){
        $mark = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $user = $this->marksDAO->update($mark);
            ResponseGenerator::setData($responseDTO,$mark);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Mark-Updated-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Mark-Updated");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $mark = $this->marksDAO->deleteById($id);
            ResponseGenerator::setData($responseDTO,$mark);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Marks-Deleted-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Marks-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $mark = $this->marksDAO->deleteByIds($ids);
            ResponseGenerator::setData($responseDTO,$mark);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Marks-Deleted-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Marks-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }
}