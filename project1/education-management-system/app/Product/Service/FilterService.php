<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 9/3/2016
 * Time: 11:59 AM
 */
namespace App\Product\Service;
use App\Log\LogUtil;
use App\Product\Exception\DAOException;
use App\Product\Exception\FilterException;
use App\Product\Filter\Filters\FilterCourseByGrade;
use App\Product\Filter\Filters\FilterUserByCourse;
use App\Product\Filter\Filters\FilterUserByStatus;
use App\Product\Filter\Filters\FilterUserByGrade;
use App\Product\Filter\Filters\FilterUserByRoom;
use App\Product\Filter\Filters\FilterUserByRole;
use App\Product\Filter\Filters\FilterAttendanceByUser;
use App\Facades\ResponseGenerator;


class FilterService implements IFilterService{

    private $LOGGER;

    public function __construct(){
        $this->LOGGER = LogUtil::getLoggerInstance(FilterService::class);
    }


    public function filterFromRequest($filterRequest){
        if(is_array($filterRequest)){
            $filterRequest = (object) $filterRequest;
        }

        $responseDTO = ResponseGenerator::createResponseDTO();
        try {
            $filterId = $filterRequest->id;
            $getPickList = false;

            if(isset($filterRequest->getFilterPickList)){
                $getPickList = true;
            }else{
                $comparisonOp =  $filterRequest->comparisonOp;
                $params = $filterRequest->params;
            }

            //filterUserByStatus
            if($filterRequest->id == 'filterUserByStatus'){
                if($getPickList){
                    $result = FilterUserByStatus::getFilterPickList();
                }else{
                    $filterUserByStatus = new FilterUserByStatus(
                        $filterId, $comparisonOp, $params
                    );
                    $result =  $filterUserByStatus->filterFromDB();
                }
            }
            //filterUserByCourse
            else if($filterRequest->id == 'filterUserByCourse'){
                if($getPickList){
                    $result = FilterUserByCourse::getFilterPickList();
                }else{
                    $filterUserByStatus = new FilterUserByCourse(
                        $filterId, $comparisonOp, $params
                    );
                    $result =  $filterUserByStatus->filterFromDB();
                }
            }
            //filterUserByGrade
            else if($filterRequest->id == 'filterUserByGrade'){
                if($getPickList){
                    $result = FilterUserByGrade::getFilterPickList();
                }else{
                    $filterUserByGrade = new FilterUserByGrade(
                        $filterId, $comparisonOp, $params
                    );
                    $result =  $filterUserByGrade->filterFromDB();
                }
            }
            //filterCourseByGrade
            else if($filterRequest->id == 'filterCourseByGrade'){
                if($getPickList){
                    $result = FilterCourseByGrade::getFilterPickList();
                }else{
                    $filterCourseByGrade = new FilterCourseByGrade(
                        $filterId, $comparisonOp, $params
                    );
                    $result =  $filterCourseByGrade->filterFromDB();
                }
			}
            //filterUserByRole
            else if($filterRequest->id == 'filterUserByRole') {
                if ($getPickList) {
                    $result = FilterUserByRole::getFilterPickList();
                } else {
                    $filterUserByRole = new FilterUserByRole(
                        $filterId, $comparisonOp, $params
                    );
                    $result = $filterUserByRole->filterFromDB();
                }
                //filterAttendanceByUser
            }else if($filterRequest->id == 'filterAttendanceByUser'){
                if($getPickList){
                    $result = FilterAttendanceByUser::getFilterPickList();
                }else{
                    $filterAttendanceByUser = new FilterAttendanceByUser(
                        $filterId, $comparisonOp, $params
                    );
                    $result =  $filterAttendanceByUser->filterFromDB();
                }
            }

			if(!isset($result)){
			    throw new FilterException("Could not determine the result for filter request :".json_encode($filterRequest));
            }

            ResponseGenerator::setData($responseDTO,$result);
            ResponseGenerator::setHttpStatus($responseDTO,200);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"RES-Filter");
        }
        catch(FilterException $e){
            $this->LOGGER->error($e,"Exception Encountered while serving filter request.");
            ResponseGenerator::addErrorMessage($responseDTO,$e->getMessage());
            ResponseGenerator::setHttpStatus($responseDTO,400);
            ResponseGenerator::setBusinessStatusCode($responseDTO,"!RES-Filter");
        }
        return ResponseGenerator::getResponse($responseDTO);
    }

}