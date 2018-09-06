<?php

namespace App\Http\Middleware;

use Closure;

class AuthHome
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
        if(!\Auth::guard("web")->check()){
            //return redirect()->route("login.html");
            echo "未登录";
        }
        return $next($request);
    }
}
