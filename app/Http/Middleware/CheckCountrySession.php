<?php

namespace Ngea\Http\Middleware;

use Closure;
use Auth;
use Ngea\Http\Controllers\Auth\AuthController;

class CheckCountrySession extends AuthController
{

    public function handle($request, Closure $next)
    {
        if(session('maincountry') == NULL){

            $this->getLogin();

        }   

        return $next($request);
    }

}
