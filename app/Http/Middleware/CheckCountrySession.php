<?php

namespace App\Http\Middleware;

use Closure;

class CheckCountrySession
{

    public function handle($request, Closure $next)
    {
        if(session('maincountry')!=NULL){
            return redirect('auth/login');
        }   

        return $next($request);
    }

}
