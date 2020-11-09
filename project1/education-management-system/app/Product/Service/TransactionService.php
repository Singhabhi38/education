<?php
/**
 * Created by PhpStorm.
 * User: Krishna
 * Date: 10/2/2016
 * Time: 5:26 PM
 */

namespace App\Product\Service;

use App\Facades\ResponseGenerator;
use App\Product\DAO\TransactionDAO;
use Illuminate\Support\Facades\Auth;

class TransactionService implements ITransactionService
{
    private $transactionDAO;

    public function __construct(TransactionDAO $transactionDAO){
        $this->transactionDAO = $transactionDAO;
    }

    public function findAll($request)
    {
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $transactions = $this->transactionDAO->findAll(array());
            ResponseGenerator::setData($responseDTO,$transactions);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Transaction-*"); // Means Sending Response with * users
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Transaction"); // Means Sending Response with no users
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findById($request, $id)
    {
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $transaction = $this->transactionDAO->findById($id, array());
            ResponseGenerator::setData($responseDTO,$transaction);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Transaction-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Transaction");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function findByIds($request, $ids)
    {
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $transaction = $this->transactionDAO->findByIds($ids, array());
            ResponseGenerator::setData($responseDTO,$transaction);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Transaction-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Transaction");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function create($request)
    {
        $transaction = $request->all();
        $transaction['createdBy'] = Auth::user()->id;
        $transaction['updatedBy'] = Auth::user()->id;
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $transaction = $this->transactionDAO->create($transaction);
            ResponseGenerator::setData($responseDTO,$transaction);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Transaction-Created-1");
        }catch(\Exception $e) {
            throw $e;
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Transaction-Created");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function update($request, $id)
    {
        $transaction = $request->all();
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $transaction = $this->transactionDAO->update($transaction);
            ResponseGenerator::setData($responseDTO,$transaction);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"Transaction-Updated-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!Transaction-Updated");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteById($request, $id)
    {
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $transaction = $this->transactionDAO->deleteById($id);
            ResponseGenerator::setData($responseDTO,$transaction);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Transaction-Deleted-1");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Transaction-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

    public function deleteByIds($request, $ids)
    {
        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $transaction = $this->transactionDAO->deleteByIds($ids);
            ResponseGenerator::setData($responseDTO,$transaction);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Transaction-Deleted-*");
        }catch(\Exception $e) {
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,500);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Transaction-Deleted");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }
}