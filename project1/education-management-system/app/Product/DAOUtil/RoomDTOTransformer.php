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

class RoomDTOTransformer implements IDTOTransformer{
    use NepaliDateConvertible;
    /*
     * Transforming data coming from the front end and Service to savable object
     */
    public function formatDataToDb($dto){
        if(is_array($dto)){
            $dto = (object) $dto;
        }

        if(isset($dto->id)){
            $result['id'] = $dto->id;
        }

        if(isset($dto->name)){
            $result['name'] = $dto->name;
        }

        if(isset($dto->building)){
            $result['building'] = $dto->building;
        }

        if(isset($dto->room)){
            $result['room'] = $dto->room;
        }

        if(isset($dto->floor)){
            $result['floor'] = $dto->floor;
        }

        return $result;
    }

    /*
     * Transforming the database rows to a object
     */
    public function formatDataFromDb($databaseRow){
        if(is_array($databaseRow)) {
            $databaseRow = (object) $databaseRow;
        }
        $result['id'] = isset($databaseRow->id) ? $databaseRow->id : null;
        $result['name'] = isset($databaseRow->name) ? $databaseRow->name : null;
        $result['building'] = isset($databaseRow->building) ? $databaseRow->building : null;
        $result['room'] = isset($databaseRow->room) ? $databaseRow->room : null;
        $result['floor'] = isset($databaseRow->floor) ? $databaseRow->floor : null;
        $result['createdAt'] = isset($databaseRow->created_at) ? $this->convertToBS ($databaseRow->created_at) : null;
        $result['updatedAt'] = isset($databaseRow->updated_at) ? $this->convertToBS ($databaseRow->updated_at) : null;
        return $result;
    }
}