<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 10/23/2016
 * Time: 7:43 AM
 */
namespace App\Product\DAO;

Class BaseDAO{

    /*
     *Expects Array
     */
    protected function assignCreatedAtToCurrentDate($entity){
        if(is_array($entity)){
            $entity['createdAt'] = date("Y-m-d H:i:s");
        }
        return $entity;
    }

    /*
     *Expects Array
     */
    protected function assignUpdatedAtToCurrentDate($entity){
        if(is_array($entity)){
            $entity['updatedAt'] = date("Y-m-d H:i:s");
        }
        return $entity;
    }


}