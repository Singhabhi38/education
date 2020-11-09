<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/19/2016
 * Time: 7:41 PM
 */

namespace App\Product\Response;

Class ResponseDTO{

    private $response;

    public function __construct(){
        $this->response['data'];
        $this->response['status'];
        $this->response['businessStatusCode'];
        $this->response['info'] = array();
        $this->response['warning'] = array();
        $this->response['error'] = array();
    }

    public function setData($data){
        $this->response['data'] = $data;
    }

    public function setHttpStatus($status){
        $this->response['status'] = $status;
    }

    public function setBusinessStatusCode($businessStatusCode){
        $this->response['businessStatusCode'] = $businessStatusCode;
    }

    public function addInfoMessage($msg){
        array_push($this->response['info'],$msg);
    }

    public function addErrorMessage($msg){
        array_push($this->response['error'],$msg);
    }

    public function addWarningMessage($msg)
    {
        array_push($this->response['warning'], $msg);
    }

    public function getResponse(){
        return $this->response;
    }

}