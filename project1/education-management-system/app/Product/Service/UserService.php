<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/1/2016
 * Time: 6:57 PM
 */

namespace App\Product\Service;

use App\Facades\ResponseGenerator;
use App\Log\LogUtil;
use App\Product\DAO\UserDAO;
use App\Product\Exception\SecurityException;

Class UserService implements IUserService{

    private $userDAO;

    private $LOGGER;

    public function __construct(UserDAO $uDAO){
            $this->userDAO = $uDAO;
        //
        $this->LOGGER = LogUtil::getLoggerInstance(UserService::class);
    }

    public function findAll($request){
        $this->LOGGER->info("Finding all users.");
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $users = $this->userDAO->findAll(array());
            ResponseGenerator::setData($responseDTO,$users);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-User-*"); // Means Sending Response with * users
        }catch(\Exception $e) {
            $this->LOGGER->error($e,"Exception Encountered while serving find all request.");
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-User"); // Means Sending Response with no users
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findById($request,$id){
        $this->LOGGER->info("Finding User : ".$id);
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $user = $this->userDAO->findById($id, array());
            ResponseGenerator::setData($responseDTO,$user);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-User-1");
        }catch(\Exception $e) {
            $this->LOGGER->error($e,"Exception Encountered while serving find by ID request.");
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-User");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $user = $this->userDAO->findByIds($ids, array());
            ResponseGenerator::setData($responseDTO,$user);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-User-*");
        }catch(\Exception $e) {
            $this->LOGGER->error($e,"Exception Encountered while serving find by IDs request.");
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-User");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function create($request){

        $user = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $user = $this->userDAO->create($user);
            ResponseGenerator::setData($responseDTO,$user);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"User-Created-1");
        }catch(\Exception $e) {
            $this->LOGGER->error($e,"Exception Encountered while creating a User.");
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!User-Created");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function update($request,$id){
        $user = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $user = $this->userDAO->update($user);
            ResponseGenerator::setData($responseDTO,$user);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"User-Updated-1");
        }catch(\Exception $e) {
            $this->LOGGER->error($e,"Exception Encountered while updating a User.");
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!User-Updated");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteById($request,$id){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $user = $this->userDAO->deleteById($id);
            ResponseGenerator::setData($responseDTO,$user);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-User-Deleted-1");
        }catch(\Exception $e) {
            $this->LOGGER->error($e,"Exception Encountered while deleting a User.");
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-User-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteByIds($request,$ids){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $user = $this->userDAO->deleteByIds($ids);
            ResponseGenerator::setData($responseDTO,$user);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-User-Deleted-*");
        }catch(\Exception $e) {
            $this->LOGGER->error($e,"Exception Encountered while deleting users by IDs.");
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-User-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function verifyEmailAddressAndActivateUser($request, $userId, $emailAddress, $emailVerificationCode){
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $user = $this->userDAO->findById($userId, array());
            if($user['emailVerificationCode'] == $emailVerificationCode &&
               $user['email'] == $emailAddress){
                $activateUser = array();
                $activateUser['id'] = $userId;
                $activateUser['emailVerificationCode'] =  mt_rand(100000, 999999); // Adding Random 6 digit Number
                $activateUser['status'] = "ACTIVE";
                $updatedUser = $this->userDAO->update($activateUser);
            }else{
                throw new SecurityException("Could not verify email address and confirmation code.");
            }
            ResponseGenerator::setData($responseDTO,$updatedUser);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"User-Email-Verified-User-Activated-1");
        }catch(\Exception $e) {
            $this->LOGGER->error($e,"Exception Encountered while verifying user email address.");
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!User-Email-Verified-User-Activated-1");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }
}