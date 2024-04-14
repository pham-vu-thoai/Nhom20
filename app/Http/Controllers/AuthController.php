<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\user\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //
    public  function login(){
        return view('auth.login');
    }
 
    public function    register(){
        return view('auth.register');
    }
  
    public function    forgotpassword(){
        return view('auth.forgot');
    }
    public function create_user(Request $request){
        $request -> validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>''
        ]);
    }
    public function auth_login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
    

}
