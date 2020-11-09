<?php
namespace App\Product\DAO;

use App\UserDetailModel;

Class UserDetailDAO implements IUserDetailDAO{

    public function findAll($columns){
        $userDetails = UserDetailModel::all();
        return $userDetails;
    }

    public function findById($id,$columns){
        $userDetail = UserDetailModel::findOrFail($id);
        return $userDetail;
    }

    public function findByIds($ids,$columns){

    }

    public function create($entity){

    }

    public function update($entity){

    }

    public function deleteById($id){

    }

    public function deleteByIds($ids){

    }

}

