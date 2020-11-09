<?php
namespace App\Product\DAO;

use App\Events\TransactionCreated;
use App\TransactionModel;
use App\Product\DAOUtil\TransactionDTOTransformer;
use App\Product\Response\ResponseGenerator;
use App\Product\Exception\DAOException;

Class TransactionDAO implements ITransactionDAO{

    private $transactionDTOTransformer;

    public function __construct(){
        $this->transactionDTOTransformer = new TransactionDTOTransformer();
    }

    public function findAll($columns){
        $transactions = TransactionModel::all();
        if($transactions != null){
            $result = array();
            foreach($transactions as $key => $transaction){
                $result[$key] = $this->transactionDTOTransformer->formatDataFromDb($transaction);
            }
        }else{
            throw new DAOException("Error fetching all transactions !");
        }
        return $result;
    }

    public function findById($id,$columns){
        $transaction = TransactionModel::find($id);
        if($transaction != null){
            $transaction = $this->transactionDTOTransformer->formatDataFromDb($transaction);
        }else{
            throw new DAOException("Error fetching Transaction with id:".$id." !");
        }
        return $transaction;
    }

    public function findByIds($ids,$columns){
        $transactions = TransactionModel::whereIn('id',$ids)->get();
        if($transactions != null){
            $result = array();
            foreach($transactions as $key => $transaction){
                $result[$key] = $this->transactionDTOTransformer->formatDataFromDb($transaction);
            }
        }else{
            throw new DAOException("Error fetching all Transactions!");
        }
        return $result;
    }

    public function create($transaction){
        $transaction['created_at_np'] = date("Y-m-d H:i:s");
        $transaction['updated_at_np'] = date("Y-m-d H:i:s");
        $result = $this->transactionDTOTransformer->formatDataToDb($transaction);
        unset($result->id); // As we are inserting new record we need to remove any ID that may have come from front end
        $insertedTransactionModel = TransactionModel::create($result);

        // Get
        $transactionFromDatabase = $this->findById($insertedTransactionModel->id,array());
        event(new TransactionCreated($transactionFromDatabase));
        return $insertedTransactionModel;
    }

    public function update($transaction){
        $transformedTransactionEntity = $this->transactionDTOTransformer->formatDataToDb($transaction);
        TransactionModel::where('id','=',$transaction['id'])
            ->update($transformedTransactionEntity);
        return $this->transactionDTOTransformer->formatDataFromDb($transformedTransactionEntity);
    }

    public function deleteById($id){
        $transaction = TransactionModel::where('id','=',$id)->delete();
        if($transaction == null){
            throw new DAOException("Error deleting transaction with given IDs!");
        }
        return null;
    }

    public function deleteByIds($ids){
        $transactions = TransactionModel::whereIn('id',$ids)->delete();
        if($transactions == null){
            throw new DAOException("Error deleting transactions with given IDs!");
        }
        return null;
    }
}