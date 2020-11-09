<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 9/3/2016
 * Time: 11:34 AM
 */

namespace App\Product\Filter\Filters;

use App\Product\Filter\Template\FilterTemplate;
use App\Product\Filter\FilterValidation\IFilterValidation;
use App\Product\Filter\IFilter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class FilterUserByCourse extends FilterTemplate implements IFilterValidation, IFilter{

    public function __construct($id, $comparisonOp, $params){
        parent::__construct($id, $comparisonOp, $params);
        $this->validateComparisonOperator($comparisonOp, array('='));
    }

    public function filterFromDB(){
        $dbResults =  DB::table('course_user')
                        ->where('course_id', '=' ,$this->getParams())
                        ->select('user_id AS userId','id')
                        ->get();

        $dbResults = collect($dbResults);

        return $dbResults;
    }

    /*
    * Returns the LIST / ITEMS to select from in front end filters
    */
    public static function getFilterPickList(){

        $cacheTTL =  FilterTemplate::getFilterCacheTTL();

        $dbResults = Cache::remember(FilterUserByCourse::class.'::'.'PICK-LIST',$cacheTTL,
                                     function() {
                                        return DB::table('courses')
                                            ->where('deleted_at','=',null)
                                            ->distinct()
                                            ->get(array('id','name'));
                                     });

        return $dbResults;
    }
}