<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/28/2016
 * Time: 4:04 PM
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    use AuthenticatesAndRegistersUsers;

    public function __construct(){
        //
        $this->middleware('simpleCustomGETPOSTCache');
    }

//    public function doLogin(Request $request){
//        $loginStatus = Auth::attempt($request->all(),true);
//        $responseDTO = ResponseGenerator::createResponseDTO();
//        if(!$loginStatus) {
//            ResponseGenerator::addErrorMessage($responseDTO,"Auth Failure!");
//            ResponseGenerator::setHttpStatus($responseDTO,401);
//            ResponseGenerator::setBusinessStatusCode($responseDTO,"AuthFailure");
//            return ResponseGenerator::getResponse($responseDTO);
//        }
//        return redirect()->intended('/');
//    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

}
