<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/1/2016
 * Time: 6:57 PM
 */

namespace App\Product\Service;

use App\Facades\ResponseGenerator;
use App\Product\DAO\AddressDAO;

Class AddressService implements IAddressService{

    private $addressDAO;

    public function __construct(AddressDAO $addressDAO){
        $this->addressDAO = $addressDAO;
    }

    public function findAll($request){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $addresses = $this->addressDAO->findAll(array());
            ResponseGenerator::setData($responseDTO,$addresses);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Addresses-*"); // Means Sending Response with * Addresses
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Addresses"); // Means Sending Response with no Address
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findById($request,$Id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $addresses = $this->addressDAO->findById($Id, array());
            ResponseGenerator::setData($responseDTO,$addresses);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Addresses-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Addresses");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $addresses = $this->addressDAO->findByIds($ids, array());
            ResponseGenerator::setData($responseDTO,$addresses);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Addresses-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Addresses");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function create($request){

        $addresses = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $addresses = $this->addressDAO->create($addresses);
            ResponseGenerator::setData($responseDTO,$addresses);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Addresses-Created-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Addresses-Created");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function update($request,$id){
        $addresses = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $addresses   = $this->addressDAO->update($addresses);
            ResponseGenerator::setData($responseDTO,$addresses);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Addresses-Updated-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Addresses-Updated");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $addresses = $this->addressDAO->deleteById($id);
            ResponseGenerator::setData($responseDTO,$addresses);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Addresses-Deleted-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Addresses-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $addresses = $this->addressDAO->deleteByIds($ids);
            ResponseGenerator::setData($responseDTO,$addresses);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Address-Deleted-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Address-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }
}