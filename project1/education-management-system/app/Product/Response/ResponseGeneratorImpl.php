<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/3/2016
 * Time: 7:17 PM
 */

namespace App\Product\Response;

class ResponseGeneratorImpl implements IResponseGenerator{

    public function __construct(){}

    public function setData($responseDTO, $data){
        $responseDTO->setData($data);
    }

    public function setHttpStatus($responseDTO, $status){
        $responseDTO->setHttpStatus($status);
    }

    public function setBusinessStatusCode($responseDTO, $businessStatusCode){
        $responseDTO->setBusinessStatusCode($businessStatusCode);
    }

    public function addInfoMessage($responseDTO, $msg){
        $responseDTO->addInfoMessage($msg);
    }

    public function addErrorMessage($responseDTO, $msg){
        $responseDTO->addErrorMessage($msg);
    }

    public function addWarningMessage($responseDTO, $msg){
        $responseDTO->addWarningMessage($msg);
    }

    public function createResponseDTO(){
        return new ResponseDTO();
    }

    public function getResponse($responseDTO){
        return $responseDTO->getResponse();
    }

    public function addStackTraceOfError($responseDTO, \Exception $exception){
        $stackTrace = $exception->getTraceAsString();
        $stackTrace = 'Stack Trace : '.$stackTrace;
        $responseDTO->addErrorMessage($stackTrace);
    }

}