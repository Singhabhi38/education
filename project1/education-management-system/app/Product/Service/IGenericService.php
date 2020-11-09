<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/20/2016
 * Time: 6:09 PM
 */
namespace App\Product\Service;

interface IGenericService{
    public function findAll($request);

    public function findById($request,$id);

    public function findByIds($request,$ids);

    public function create($request);

    public function update($request,$id);

    public function deleteById($request,$id);

    public function deleteByIds($request,$ids);
}