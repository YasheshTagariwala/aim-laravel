<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class RoleCheckSup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::get('groupid') == 3) {
            return $next($request);
        }else {
            if(Session::get('groupid') == 2) {
                return redirect()->to('/organization');
            }
            if(Session::get('groupid') == 4) {
                return redirect()->to('/investor');
            }
            if(Session::get('groupid') == 1) {
                return redirect()->to('/entrepreneur');
            }
        }
    }
}
