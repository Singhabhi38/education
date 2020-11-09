<?php
namespace App\Product\Filter\Filters;

use App\Product\Filter\Template\FilterTemplate;
use App\Product\Filter\FilterValidation\IFilterValidation;
use App\Product\Filter\IFilter;
use Illuminate\Support\Facades\DB;


class FilterUserByRoom extends FilterTemplate implements IFilterValidation, IFilter{

    public function __construct($id, $comparisonOp, $params)
    {
        parent::__construct($id, $comparisonOp, $params);
        $this->validateComparisonOperator($comparisonOp, array('=','in'));
    }

    public function filterFromDB(){
        return array();
    }

    /*
    * Returns the LIST / ITEMS to select from in front end filters
    */
    public static function getFilterPickList(){

    }
}