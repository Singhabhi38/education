<?php

namespace  App\Product\DAOUtil;
use App\Product\DAOUtil\IDTOTransformer;
use App\Product\ProductTrait\DateTime\NepaliDateConvertible;

class ProductMsgDTOTransformer implements IDTOTransformer{

//    use NepaliDateConvertible;

    /*
     * Transforming data coming from the front end and Service to savable object
     */
    public function formatDataToDb($dto){
        if(is_array($dto)){
            $dto = (object) $dto;
        }

        $result = Array();

        if(isset($dto->id)){
            $result['id'] = $dto->id;
        }

        if(isset($dto->subject)){
            $result['subject'] = $dto->subject;
        }


        if(isset($dto->message)){
            $result['body'] = $dto->message;
        }

        if(isset($dto->recipients)) {
            $result['recipients'] = $dto->recipients;
        }

        return $result;
    }

    /*
     * Transforming the database rows to a object
     */
    public function formatDataFromDb($databaseRow){

    }

}