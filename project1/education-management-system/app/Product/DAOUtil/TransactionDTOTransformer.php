<?php
/**
 * Created by PhpStorm.
 * User: Krishna
 * Date: 10/2/2016
 * Time: 4:57 PM
 */

namespace App\Product\DAOUtil;
use App\Product\DAOUtil\IDTOTransformer;
use App\Product\ProductTrait\DateTime\NepaliDateConvertible;


class TransactionDTOTransformer implements IDTOTransformer
{

    use NepaliDateConvertible;
    /*
     * Transforming data coming from the front end and Service to savable object
     */
    public function formatDataToDb($dto)
    {
        if(is_array($dto)){
            $dto = (object) $dto;
        }

        if(isset($result['id'])) {
            $result['id'] = $dto->id;
        }

        if(isset($dto->userId)){
            $result['user_id'] = $dto->userId;
        }

        if(isset($dto->createdBy)){
            $result['created_by'] = $dto->createdBy;
        }

        if(isset($dto->updatedBy)){
            $result['updated_by'] = $dto->updatedBy;
        }

        if(isset($dto->name)){
            $result['name'] = $dto->name;
        }

        if(isset($dto->type)){
            $result['type'] = $dto->type;
        }

        if(isset($dto->billNo)){
            $result['bill_no'] = $dto->billNo;
        }

        if(isset($dto->amount)){
            $result['amount'] = $dto->amount;
        }

        if(isset($dto->remarks)){
            $result['remarks'] = $dto->remarks;
        }

        return $result;
    }


    /*
     * Transforming the database rows coming directly from Database to a object
     */
    public function formatDataFromDb($databaseRow)
    {
        if(is_array($databaseRow)){
            $databaseRow = (object) $databaseRow;
        }
        $result['id'] = isset($databaseRow->id) ? $databaseRow->id : '';
        $result['userId'] = isset($databaseRow->user_id) ? $databaseRow->user_id : '';
        $result['updatedBy'] = isset($databaseRow->updated_by)? $databaseRow->updated_by : '';
        $result['createdBy'] = isset($databaseRow->created_by)? $databaseRow->created_by : '';
        $result['name'] = isset($databaseRow->name) ? $databaseRow->name : '';
        $result['type'] = isset($databaseRow->type) ? $databaseRow->type : '';
        $result['billNo'] = isset($databaseRow->bill_no)? $databaseRow->bill_no : '';
        $result['amount'] = isset($databaseRow->amount)? $databaseRow->amount : '';
        $result['remarks'] = isset($databaseRow->remarks)? $databaseRow->remarks : '';
        $result['createdAt'] = isset($databaseRow->created_at) ? $databaseRow->created_at : null;
        $result['createdAtNp'] = isset($databaseRow->created_at) ? $this->convertToBS($databaseRow->created_at) : null;
        $result['updatedAt'] = isset($databaseRow->updated_at)? $databaseRow->updated_at : null;

        return $result;
    }
}