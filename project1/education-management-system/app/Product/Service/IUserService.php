<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/21/2016
 * Time: 7:13 AM
 */

namespace App\Product\Service;


interface IUserService extends IGenericService{

    public function verifyEmailAddressAndActivateUser($request, $userId, $emailAddress, $emailVerificationCode);

}