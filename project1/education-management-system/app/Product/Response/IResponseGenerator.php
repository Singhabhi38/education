<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/3/2016
 * Time: 7:14 PM
 */

namespace App\Product\Response;

interface IResponseGenerator{

    public function setData($responseDTO,$data);

    public function setHttpStatus($responseDTO,$status);

    public function setBusinessStatusCode($responseDTO,$businessStatusCode);

    public function addInfoMessage($responseDTO,$msg);

    public function addErrorMessage($responseDTO,$msg);

    public function addWarningMessage($responseDTO,$msg);

    public function createResponseDTO();

    public function getResponse($responseDTO);

    public function addStackTraceOfError($responseDTO, \Exception $exception);

}