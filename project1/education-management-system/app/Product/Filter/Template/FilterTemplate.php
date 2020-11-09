<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 9/3/2016
 * Time: 11:30 AM
 */

namespace App\Product\Filter\Template;

use App\Product\Exception\FilterException;

class FilterTemplate{

    protected static $FILTER_CACHE_TTL = 5;

    private $id;

    private $comparisonOperator;

    private $params;

    public function __construct($id,$comparisonOp,$params){
        $this->id = $id;
        $this->comparisonOperator = $comparisonOp;
        $this->params = $params;

        $this->validate();
    }


    public static function getFilterCacheTTL(){
        return 5;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id){
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getParams(){
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params){
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getComparisonOperator(){
        return $this->comparisonOperator;
    }

    /**
     * @param mixed $comparisonOperator
     */
    public function setComparisonOperator($comparisonOperator){
        $this->comparisonOperator = $comparisonOperator;
    }

    public function validate(){
        $validCmpOperators = array('=','<','>','in','!=','notIn','inBtn');

        if(!in_array($this->comparisonOperator,$validCmpOperators)){
            throw new FilterException("Invalid comparison operator. '".$this->comparisonOperator."' is not allowed.!");
        }


        if($this->comparisonOperator == '='
            || $this->comparisonOperator == '<'
            || $this->comparisonOperator == '>'
            || $this->comparisonOperator == '!='
        ){

            if($this->validateParamsAndComparisonOp($this->params,'value')){
                return true;
            }


        }else if($this->comparisonOperator == 'in'
                || $this->comparisonOperator == 'inBtn'
                || $this->comparisonOperator == 'notIn'
        ){

            if($this->validateParamsAndComparisonOp($this->params,'array')){
                return true;
            }

        }
    }

    public function validateComparisonOperator($op, array $expected){
        if(!in_array($op ,$expected)) {
            throw new FilterException("Comparison Operator '".$op."' is not allowed for the requested filter Id!");
        }
        return true;
    }

    public function validateParamsAndComparisonOp($params, $typeExpected){

        if($typeExpected == 'value'){
            if(is_array($params) || is_object($params)){
                throw new FilterException("Parameter for the filter should be a value.");
            }
        }else if($typeExpected == 'array'){
            if(!is_array($params)){
                throw new FilterException("Parameter for the filter should be an array.");
            }
        }
        return true;
    }
}