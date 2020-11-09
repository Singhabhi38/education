<?php
namespace App\Product\DAO;

use App\AddressModel;
use App\Product\DAOUtil\AddressDTOTransformer;
use App\Product\Response\ResponseGenerator;
use App\Product\Exception\DAOException;

Class AddressDAO implements IAddressDAO{

    private $addressDTOTransformer;

    public function __construct(){
        $this->addressDTOTransformer = new AddressDTOTransformer();
    }

    public function findAll($columns){
        $addresses = AddressModel::all();

        $result = array();
        foreach($addresses as $address){
            array_push($result,$this->addressDTOTransformer->formatDataFromDb($address));
        }
        return $result;
    }

    public function findById($id,$columns){
        $address = AddressModel::find($id);

        if($address != null){
            $address = $this->addressDTOTransformer->formatDataFromDb($address);
        }else{
            throw new DAOException("Error fetching Address with id:".$id." !");
        }
        return $address;
    }

    public function findByIds($ids,$columns){
        $addresses = AddressModel::whereIn('id',$ids)->get();
        if($addresses != null){
            foreach($addresses as $address){
                $result[] = $this->addressDTOTransformer->formatDataFromDb($address);
            }
        }else{
            throw new DAOException("Error fetching all Addresses!");
        }
        return $result;
    }

    public function create($address){
        $result = $this->addressDTOTransformer->formatDataToDb($address);
        unset($result->id); // As we are inserting new record we need to remove any ID
        $insertedAddressModel = AddressModel::create($result);
        return $this->addressDTOTransformer
            ->formatDataFromDb(
                $insertedAddressModel
            );
    }

    public function update($address){
        $transformedAddressEntity = $this->addressDTOTransformer->formatDataToDb($address);
        AddressModel::where('id','=',$address['id'])
            ->update($transformedAddressEntity);
        return $this->addressDTOTransformer->formatDataFromDb($transformedAddressEntity);
    }


    public function deleteById($id){
        $address = AddressModel::where('id','=',$id)->delete();
        if($address == null){
            throw new DAOException("Error deleting a Address!");
        }
        return null;
    }

    public function deleteByIds($ids){
        $addresses = AddressModel::whereIn('id',$ids)->delete();
        if($addresses == null){
            throw new DAOException("Error deleting all Addresses!");
        }
        return null;
    }
}