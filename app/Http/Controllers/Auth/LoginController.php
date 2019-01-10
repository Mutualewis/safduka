<?php

namespace Ngea\Http\Controllers\Auth;

use Ngea\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use Illuminate\Contracts\Auth\Authenticable;

use Ngea\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {
       
        $validator = \Validator::make($request->all(), [
            'usr_email' => 'required', 'password' => 'required|min:4',
        ]);
        
        if ($validator->fails()) {    
            return response()->json(['message' => "validate",'errors' => $validator->messages()], 200);
        }
        $userdata = array(
            'usr_email'     => $request->usr_email,
            'password'  => $request->password,
        );
        if (Auth::attempt($userdata)) {
            $user = Auth::user();
            $user->generateToken();

            return response()->json([
                'message' => "Login successful",
                'data' => $user->toArray(),
            ])
            ->setStatusCode(200);
        }
        

        
        return response()
            ->json(['message' => 'These credentials do not match our records.'])
            ->setStatusCode(422);
    }

    
}
