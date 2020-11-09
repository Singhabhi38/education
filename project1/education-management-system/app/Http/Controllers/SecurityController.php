<?php

namespace App\Http\Controllers;

use App\Product\Service\UserService;
use Illuminate\Http\Request;
use App\Product\Service\SecurityService;

class SecurityController extends Controller
{
    private $userService;

    public function __construct(UserService $usrService){
        $this->userService = $usrService;
    }

    public function verifyEmailAddressAndActivateUser(Request $request){
        $email = $request->get('email');
        $code = $request->get('code');
        $userId = $request->get('id');
        return $this->userService->verifyEmailAddressAndActivateUser($request, $userId, $email, $code);
    }
}
