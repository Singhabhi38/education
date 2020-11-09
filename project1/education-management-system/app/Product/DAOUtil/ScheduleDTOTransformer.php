<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/3/2016
 * Time: 7:31 PM
 */

namespace  App\Product\DAOUtil;
use App\Product\DAOUtil\IDTOTransformer;
use App\Product\ProductTrait\DateTime\NepaliDateConvertible;

class ScheduleDTOTransformer implements IDTOTransformer{
    use NepaliDateConvertible;

    /*
     * Transforming data coming from the front end and Service to savable array
     */
    public function formatDataToDb($dto){
        if(is_array($dto)){
            $dto = (object) $dto;
        }

        $result = array();

        if(isset($dto->id))
        {
            $result['id'] = $dto->id;  
        } 
        
        if(isset($dto->name)){
            $result['name']=$dto->name;
        }

        if(isset($dto->from)){
            $result['from']=$dto->from;
        }

        if(isset($dto->to)){
            $result['to']=$dto->to;
        }

        if(isset($dto->except_date_time_csv)){
            $result['except_date_time_csv']=$dto->except_date_time_csv;
        }

        if(isset($dto->sun)){
            $result['sun']=$dto->sun;
        }

        if(isset($dto->mon)){
            $result['mon']=$dto->mon;
        }

        if(isset($dto->tue)){
            $result['tue']=$dto->tue;
        }

        if(isset($dto->wed)){
            $result['wed']=$dto->wed;
        }

        if(isset($dto->thu)){
            $result['thu']=$dto->thu;
        }

        if(isset($dto->fri)){
            $result['fri']=$dto->fri;
        }

        if(isset($dto->sat)){
            $result['sat']=$dto->sat;
        }

        if(isset($dto->createdBy)){
            $result['created_by'] = $dto->createdBy;
        }

        if(isset($dto->updatedBy)){
            $result['updated_by'] = $dto->updatedBy;
        }

        return $result;
    }

    /*
     * Transforming the database rows coming directly from Database to a array
     */
    public function formatDataFromDb($databaseRow){
        if(is_array($databaseRow)){
            $databaseRow = (object) $databaseRow;
        }
        $result['id'] = isset($databaseRow->id) ? $databaseRow->id : null;
        $result['name'] = isset($databaseRow->name) ? $databaseRow->name : null;
        $result['from'] = isset($databaseRow->from) ? $databaseRow->from : null;
        $result['to'] = isset($databaseRow->to) ? $databaseRow->to : null;
        $result['except_date_time_csv'] = isset($databaseRow->except_date_time_csv) ? $databaseRow->except_date_time_csv : null;
        $result['sun'] = isset($databaseRow->sun) ? $databaseRow->sun : null;
        $result['mon'] = isset($databaseRow->mon) ? $databaseRow->mon : null;
        $result['tue'] = isset($databaseRow->tue) ? $databaseRow->tue : null;
        $result['wed'] = isset($databaseRow->wed) ? $databaseRow->wed : null;
        $result['thu'] = isset($databaseRow->thu) ? $databaseRow->thu : null;
        $result['fri'] = isset($databaseRow->fri) ? $databaseRow->fri : null;
        $result['sat'] = isset($databaseRow->sat) ? $databaseRow->sat : null;
        $result['createdAtNp'] = isset($databaseRow->created_at) ? $this->convertToBS($databaseRow->created_at) : null;
        return $result;
    }
}