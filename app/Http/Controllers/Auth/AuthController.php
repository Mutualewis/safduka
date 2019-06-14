<?php namespace safduka\Http\Controllers\Auth;

use safduka\User;
use Auth;
use Cookie;
use Validator;
use Input;
use Redirect;
use Hash;
use Illuminate\Http\Request;
use safduka\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Foundation\Auth\ThrottlesLogins;

use Illuminate\Contracts\Auth\Authenticable;




class AuthController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    // public function __construct(Guard $auth, Registrar $registrar)
    public function __construct()
    {

        #$this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }
     

    public function getLogin()
    {
        return redirect('auth/login');
    }

    
  
    public function getLogout()
    {
        $this->logout();

        return redirect('auth/login');
    }


}
