<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/19/2016
 * Time: 7:59 PM
 */

namespace App\Product\DAO;


interface IGenericDAO{
    public function findAll($columns);

    public function findById($id,$columns);

    public function findByIds($ids,$columns);

    public function create($entity);

    public function update($entity);

    public function deleteById($id);

    public function deleteByIds($ids);
}