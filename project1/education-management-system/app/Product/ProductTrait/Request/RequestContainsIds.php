<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/21/2016
 * Time: 9:39 AM
 */

namespace App\Product\ProductTrait\Request;


trait RequestContainsIds{
    public function getValidIds($request){
        $_ids = array();
        if($request->has('ids')){
            $ids = $request->query('ids');
            foreach($ids as $id){
                if(!empty($id) &&
                    ctype_digit($id) // Checking if the id is numeric
                ){
                    array_push($_ids,$id);
                }
            }
        }
        return $_ids;
    }
}