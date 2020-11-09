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


class FilterUserByStatus extends FilterTemplate implements IFilterValidation, IFilter{

    public function __construct($id, $comparisonOp, $params)
    {
        parent::__construct($id, $comparisonOp, $params);
        $this->validateComparisonOperator($comparisonOp, array('=','in'));
    }

    public function filterFromDB(){
        $dbResults =  DB::table('users')
                    ->where('status', '=' , $this->getParams())
                    ->select('users.id as userId')
                    ->get();

        $dbResults = collect($dbResults);
        return $dbResults;
    }

    /*
     * Returns the LIST / ITEMS to select from in front end filters
     */
    public static function getFilterPickList(){
        $dbResults = Cache::remember(FilterUserByStatus::class.'::'.'PICK-LIST',
                                     FilterTemplate::getFilterCacheTTL(),
        function() {
            return DB::table('users')
                ->where('deleted_at','=',null)
                ->distinct()
                ->get(array('status'));
        });

        return $dbResults;
    }
}