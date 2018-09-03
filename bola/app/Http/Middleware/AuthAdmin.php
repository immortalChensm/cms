<?php

namespace App\Http\Middleware;

use App\Model\Admin\Admins;
use Closure;
use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class AuthAdmin
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

        if (!session('admin')) {

            return redirect("admin/login");
        }else{
            $is_active = Admins::where("account",\Auth::user()->account)->first();
            if($is_active->status!=1){
                return redirect("admin/login");
            }
        }
        return $next($request);
    }
}
