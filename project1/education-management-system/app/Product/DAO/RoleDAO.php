<?php

namespace App\Product\DAO;

use App\RoleModel;
use App\RoleUserModel;
use App\Product\DAOUtil\RoleUserDTOTransformer;
use App\Product\DAOUtil\RoleDTOTransformer;
use App\Product\Response\ResponseGenerator;
use App\Product\Exception\DAOException;
use App\UserModel;
use App\Product\DAOUtil\UserDTOTransformer;

Class RoleDAO implements IRoleDAO{
    private $USERS_STR = 'users';


    private $roleDTOTransformer;
    private $roleUserDTOTransformer;
    private $userDTOTransformer;

    public function __construct(){
        $this->roleDTOTransformer = new RoleDTOTransformer();
        $this->roleUserDTOTransformer = new RoleUserDTOTransformer();
        $this->userDTOTransformer = new UserDTOTransformer();
    }

    public function findAll($columns){
        $roles = RoleModel::all();

        $result = array();
        foreach($roles as $role){
            array_push($result,$this->roleDTOTransformer->formatDataFromDb($role));
        }
        return $result;
    }

    public function findById($id, $columns){
        $role = RoleModel::with('users')->find($id);
        $attachedEntities = $this->attachRelatedEntitiesByFormatting($role);

        if($role != null){
            $role = $this->roleDTOTransformer->formatDataFromDb($role);
            $role[$this->USERS_STR] = $attachedEntities[$this->USERS_STR];

        }else{
            throw new DAOException("Error fetching Role with id:".$id." !");
        }
        return $role;
    }

    public function findByIds($ids, $columns)
    {
        $roles = UserModel::whereIn('id',$ids)->get();
        if($roles != null){
            $result = array();
            foreach($roles as $key => $role){
                $result[$key] = $this->userDTOTransformer->formatDataFromDb($role);
            }
        }else{
            throw new DAOException("Error fetching all Roles!");
        }
        return $result;
    }

    public function create($role){
        $result = $this->roleDTOTransformer->formatDataToDb($role);
        unset($result->id); // As we are inserting new record we need to remove any ID that may have come from frontends or services
        $insertedRoleModel = RoleModel::create($result);
        return $this->roleDTOTransformer
            ->formatDataFromDb(
                $insertedRoleModel
            );
    }

    public function update($role){
        $transformedRoleEntity = $this->roleDTOTransformer->formatDataToDb($role);
        RoleModel::where('id','=',$role['id'])
                  ->update($transformedRoleEntity);
        return $this->roleDTOTransformer->formatDataFromDb($transformedRoleEntity);
    }

    public function deleteById($id){
        $role = RoleModel::where('id','=',$id)->delete();
        if($role == null){
            throw new DAOException("Error deleting a Role!");
        }
        return null;
    }

    public function deleteByIds($ids)
    {
       $roles = RoleModel::whereIn('id',$ids)->delete();
        if($roles == null){
            throw new DAOException("Error deleting all Roles!");
        }
        return null;
    }

    public function assignRoleToUser($mappingData){
        $inputMappingData = $mappingData;
        $roleUser = $this->roleUserDTOTransformer->formatDataToDb($mappingData);
        // Deleting All Users
        RoleUserModel::where('user_id', $roleUser['user_id'])->delete();
        $roleToBeAssigned = RoleModel::where('id', $inputMappingData['roleId'])->get()->first();
        $user = UserModel::find($inputMappingData['userId']);
        // Assigning the User to Particular Role
        $user->roles()->attach($roleToBeAssigned);

        if($user->hasRole($roleToBeAssigned->name)){
            $userRoles = $user->roles()->get();
            $userRoles = collect($userRoles);
            $userRoles = $userRoles->map(function($item,$key){
                return $this->roleDTOTransformer->formatDataFromDb($item);
            });
        }else{
            throw new DAOException("Error Assigning User to particular Role.");
        }
        return $userRoles;
    }

    public function attachRelatedEntitiesByFormatting($role){
        $result = array();
        $userRoles = $role->users()->get();
        if(null != $userRoles && !empty($userRoles)){
            $result[$this->USERS_STR] = array();
            foreach($userRoles as $userRole){
                $result[$this->USERS_STR][] = $this->userDTOTransformer->formatDataFromDb($userRole);
            }
        }

        return $result;
    }
}