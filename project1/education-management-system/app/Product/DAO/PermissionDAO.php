<?php
namespace App\Product\DAO;

use App\PermissionModel;
use App\Product\DAOUtil\PermissionDTOTransformer;
use App\Product\Response\ResponseGenerator;
use App\Product\Exception\DAOException;

Class PermissionDAO implements IPermissionDAO{

    private $permissionDTOTransformer;

    public function __construct()
    {
        $this->permissionDTOTransformer = new PermissionDTOTransformer();
    }

    public function findAll($columns){
        $permissions = PermissionModel::all();
        $result = array();
        foreach($permissions as $permission){
            array_push($result,$this->permissionDTOTransformer->formatDataFromDb($permission));
        }
        return $result;
    }

    public function findById($id,$columns){
        $permission = PermissionModel::find($id);
        if($permission != null){
            $permission = $this->permissionDTOTransformer->formatDataFromDb($permission);
        }else{
            throw new DAOException("Error fetching User with id:".$id." !");
        }
        return $permission;
    }

    public function findByIds($ids,$columns){
        $permissions = PermissionModel::whereIn('id',$ids)->get();
        if($permissions != null){
            foreach($permissions as $permission){
                $result[] = $this->permissionDTOTransformer->formatDataFromDb($permission);
            }
        }else{
            throw new DAOException("Error fetching all Users!");
        }
        return $result;
    }

    public function create($permission){
        $result = $this->permissionDTOTransformer->formatDataToDb($permission);
        unset($result->id); // As we are inserting new record we need to remove any ID that may have come from frontends or services
        $insertedPermissionModel = PermissionModel::create($result);
        return $this->permissionDTOTransformer
            ->formatDataFromDb(
                $insertedPermissionModel
            );
    }

    public function update($permission){
        $transformedPermissionEntity = $this->permissionDTOTransformer->formatDataToDb($permission);
        PermissionModel::where('id','=',$permission['id'])
                  ->update($transformedPermissionEntity);
        return $this->permissionDTOTransformer->formatDataFromDb($transformedPermissionEntity);
    }

    public function deleteById($id){
         $permission = PermissionModel::where('id','=',$id)->delete();
        if($permission == null){
            throw new DAOException("Error deleting a User!");
        }
        return null;
    }

    public function deleteByIds($ids){
        $permissions = PermissionModel::whereIn('id',$ids)->delete();
        if($permissions == null){
            throw new DAOException("Error deleting all Users!");
        }
        return null;
    }

}