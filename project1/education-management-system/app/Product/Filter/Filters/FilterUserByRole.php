<?php


namespace App\Product\Filter\Filters;

use App\Product\Filter\Template\FilterTemplate;
use App\Product\Filter\FilterValidation\IFilterValidation;
use App\Product\Filter\IFilter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class FilterUserByRole extends FilterTemplate implements IFilterValidation, IFilter{

    public function __construct($id, $comparisonOp, $params){
        parent::__construct($id, $comparisonOp, $params);
        $this->validateComparisonOperator($comparisonOp, array('='));
    }

    public function filterFromDB(){
        $dbResults =  DB::table('role_user')
            ->where('role_id', '=' ,$this->getParams())
            ->select('user_id AS userId')
            ->get();

        $dbResults = collect($dbResults);

        return $dbResults;
    }

    /*
    * Returns the LIST / ITEMS to select from in front end filters
    */
    public static function getFilterPickList(){

        $dbResults = Cache::remember(FilterUserByRole::class.'::'.'PICK-LIST',
            FilterTemplate::getFilterCacheTTL(),
            function() {
                return DB::table('roles')
                    ->distinct()
                    ->get(array('id','name','display_name as displayName'));
            });

        return $dbResults;
    }
}