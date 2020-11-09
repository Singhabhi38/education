<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/1/2016
 * Time: 6:57 PM
 */

namespace App\Product\Service;

use App\Product\DAO\RoleDAO;
use App\Facades\ResponseGenerator;

Class RoleService implements IRoleService{
    private $roleDAO;

    public function __construct(RoleDAO $rDAO){
        $this->roleDAO = $rDAO;
    }

    public function findAll($request){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $roles = $this->roleDAO->findAll(array());
            ResponseGenerator::setData($responseDTO,$roles);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Role-*"); // Means Sending Response with * roles
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Role"); // Means Sending Response with no roles
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $role = $this->roleDAO->findById($id, array());
            ResponseGenerator::setData($responseDTO,$role);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Role-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Role");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $role = $this->roleDAO->findByIds($ids, array());
            ResponseGenerator::setData($responseDTO,$role);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Role-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Role");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function create($request){
        $role = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $role = $this->roleDAO->create($role);
            ResponseGenerator::setData($responseDTO,$role);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Role-Created-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Role-Created");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function update($request,$id){
        $role = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $role = $this->roleDAO->update($role);
            ResponseGenerator::setData($responseDTO,$role);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Role-Updated-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Role-Updated");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $role = $this->roleDAO->deleteById($id);
            ResponseGenerator::setData($responseDTO,$role);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Role-Deleted-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Role-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteByIds($request,$ids){
         $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $role = $this->roleDAO->deleteByIds($ids);
            ResponseGenerator::setData($responseDTO,$role);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Role-Deleted-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Role-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function assignRoleToUser($request){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $newMapping = $request->all();
            $roles = $this->roleDAO->assignRoleToUser($newMapping);
            ResponseGenerator::setData($responseDTO,$roles);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Assign-Grade-*");

              // Means Sending Response with * grades
        }catch(\Exception $e) {
            throw $e;
            
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Assign-Grade"); // Means Sending Response with no grades
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

}