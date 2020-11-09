<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/1/2016
 * Time: 6:57 PM
 */

namespace App\Product\Service;


use App\Facades\ResponseGenerator;
use App\Product\DAO\PermissionDAO;

Class PermissionService implements IPermissionService{

    private $permissionDAO;

    public function __construct(PermissionDAO $pDAO){
        $this->permissionDAO = $pDAO;
    }

    public function findAll($request){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $permissions = $this->permissionDAO->findAll(array());
            ResponseGenerator::setData($responseDTO,$permissions);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Permission-*"); // Means Sending Response with * permissions
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Permission"); // Means Sending Response with no permissions
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $permission = $this->permissionDAO->findById($id, array());
            ResponseGenerator::setData($responseDTO,$permission);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Permission-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Permission");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $permission = $this->permissionDAO->findByIds($ids, array());
            ResponseGenerator::setData($responseDTO,$permission);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Permission-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Permission");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function create($request){
        $permission = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $permission = $this->permissionDAO->create($permission);
            ResponseGenerator::setData($responseDTO,$permission);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Permission-Created-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Permission-Created");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function update($request,$id){
        $permission = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $permission = $this->permissionDAO->update($permission);
            ResponseGenerator::setData($responseDTO,$permission);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Permission-Updated-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Permission-Updated");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $permission = $this->permissionDAO->deleteById($id);
            ResponseGenerator::setData($responseDTO,$permission);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Permission-Deleted-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Permission-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $permission = $this->permissionDAO->deleteByIds($ids);
            ResponseGenerator::setData($responseDTO,$permission);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Permission-Deleted-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Permission-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }
}