<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/1/2016
 * Time: 6:57 PM
 */

namespace App\Product\Service;

use App\Product\DAO\RoomDAO;
use App\Product\DAO\CourseDAO;
use App\Product\Service\CourseService;
use App\Facades\ResponseGenerator;
use App\Product\Response\ResponseGeneratorImpl;

Class RoomService implements IRoomService{

    private $responseGenerator;
    private $roomDAO;

    public function __construct(RoomDAO $roomDAO){
        $this->responseGenerator = new ResponseGeneratorImpl();
        $this->roomDAO = $roomDAO;
    }

    public function findAll($request){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $rooms = $this->roomDAO->findAll(array());
            ResponseGenerator::setData($responseDTO,$rooms);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Rooms-*"); // Means Sending Response with * rooms
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Rooms"); // Means Sending Response with no rooms
        }
        return ResponseGenerator::getResponse($responseDTO);

    }

    public function findById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $rooms = $this->roomDAO->findById($id, array());
            ResponseGenerator::setData($responseDTO,$rooms);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Rooms-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Rooms");
        }
        return ResponseGenerator::getResponse($responseDTO);

    }

    public function findByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $rooms = $this->roomDAO->findByIds($ids, array());
            ResponseGenerator::setData($responseDTO,$rooms);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Rooms-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Rooms");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function create($request){
        $rooms = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $rooms = $this->roomDAO->create($rooms);
            ResponseGenerator::setData($responseDTO,$rooms);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Rooms-Created-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Rooms-Created");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function update($request,$id){
        $rooms = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $rooms = $this->roomDAO->update($rooms);
            ResponseGenerator::setData($responseDTO,$rooms);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Rooms-Updated-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Rooms-Updated");
        }
        return ResponseGenerator::getResponse($responseDTO);

    }

    public function deleteById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $rooms = $this->roomDAO->deleteById($id);
            ResponseGenerator::setData($responseDTO,$rooms);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Rooms-Deleted-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Rooms-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);

    }

    public function deleteByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $rooms = $this->roomDAO->deleteByIds($ids);
            ResponseGenerator::setData($responseDTO,$rooms);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Rooms-Deleted-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Rooms-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);

    }
}