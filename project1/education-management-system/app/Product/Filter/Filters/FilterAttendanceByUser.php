<?php

namespace App\Product\Filter\Filters;

use App\Product\Filter\Template\FilterTemplate;
use App\Product\Filter\FilterValidation\IFilterValidation;
use App\Product\Filter\IFilter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class FilterAttendanceByUser extends FilterTemplate implements IFilterValidation, IFilter{

    public function __construct($id, $comparisonOp, $params){
        parent::__construct($id, $comparisonOp, $params);
        $this->validateComparisonOperator($comparisonOp, array('='));
    }

    public function filterFromDB(){
        $dbResults =  DB::table('attendance')
            ->where('user_id', '=' ,$this->getParams())
            ->select('attendance.id AS attendanceId')
            ->get();

        $dbResults = collect($dbResults);

        return $dbResults;
    }

    /*
    * Returns the LIST / ITEMS to select from in front end filters
    */
    public static function getFilterPickList(){

        $dbResults = Cache::remember(FilterAttendanceByUser::class.'::'.'PICK-LIST',
            FilterTemplate::getFilterCacheTTL(),
            function() {
                return DB::table('attendance')
                    ->where('deleted_at','=',null)
                    ->distinct()
                    ->get(array('user_id'));
            });

        return $dbResults;
    }
}