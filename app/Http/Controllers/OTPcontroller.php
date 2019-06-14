<?php

namespace Ngea\Http\Controllers;

use View;

use Illuminate\Http\Request;

use Twilio;

use Input;

use Illuminate\Support\Facades\Redis;

class OTPController extends Controller
{

    public function create(Request $request)
    {
        return View::make('create');
    }

    public function validateToken(Request $request){

        $number = Input::get('number');

        $token = Input::get('token');

        $message = rand(10000, 99999);

        if (Input::get('send') !== null) {

            Redis::set('random', $message);

            Twilio::message($number, 'Your verification code is - '.$message);

        } else if (Input::get('validate') !== null) {

            $stored = Redis::get('random');

            if ($stored == $token) {
                
                return View::make('home');

            } else {
                
                return redirect('create')
                            ->withErrors("The tokens do not match!!")->withInput();
            }

        }

        return View::make('create');
    }
}