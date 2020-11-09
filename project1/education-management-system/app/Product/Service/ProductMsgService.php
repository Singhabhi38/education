<?php


namespace App\Product\Service;

use App\Product\DAO\ProductMsgDAO;
use App\Facades\ResponseGenerator;

Class ProductMsgService implements IProductMsgService {
    private $productMsgDAO;

    public function __construct(ProductMsgDAO $productMsgDAO){
        $this->productMsgDAO = $productMsgDAO;
    }

    public function findAll($request){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $messages = $this->productMsgDAO->findAll(array());
            ResponseGenerator::setData($responseDTO,$messages);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Message-*"); // Means Sending Response with * messages
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Message"); // Means Sending Response with no messages
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $message = $this->productMsgDAO->findById($id, array());
            ResponseGenerator::setData($responseDTO,$message);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Message-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Message");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findByIds($request,$ids){

    }

    public function create($request){
        $message = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $message = $this->productMsgDAO->create($message);
            ResponseGenerator::setData($responseDTO,$message);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Message-Created-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Message-Created");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function update($request,$id){
        $message = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $message = $this->productMsgDAO->update($message);
            ResponseGenerator::setData($responseDTO,$message);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Message-Updated-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Message-Updated");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteById($request,$id){

    }

    public function deleteByIds($request,$ids){

    }

}