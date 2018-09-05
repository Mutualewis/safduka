<?php namespace Ngea\Http\Controllers\Auth;

use Ngea\User;
use Ngea\country;
use Auth;
use Cookie;
use Validator;
use Input;
use Redirect;
use Hash;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
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
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        return view('auth.login',compact('country'));
    }

    
    public function postLogin(Request $request)
    {

        $this->validate($request, [
            'usr_email' => 'required','country' => 'required', 'password' => 'required|min:3',
        ]);
        $country=Input::get('country');
        $request->session()->put('maincountry', $country);
        $countryname = country::Where('id', $country)->first();
        $request->session()->put('countryname', $countryname->ctr_name);
        $userdata = array(
            'usr_email'     => Input::get('usr_email'),
            'password'  => Input::get('password'),
            'usr_active' => 1
        );
        if (Auth::attempt($userdata, $request->has('usr_remember'))) {
            return view('home');
        }
        return redirect('/auth/login')
                    ->withInput($request->only('usr_email'))
                    ->withErrors([
                        'usr_email' => 'These credentials do not match our records.',
                    ]);
            

    }

    public function getLogout()
    {
        $this->auth->logout();

        return redirect('auth/login');
    }


}
