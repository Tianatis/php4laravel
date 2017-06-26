<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class IsSuperAdmin
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
        if (Auth::check() && Auth::user()->isAdmin())
        {
           if(Auth::guard('admins')->check() && Auth::guard('admins')->user()->isSuperAdmin()){
               return $next($request);
           } else{
               abort(403, trans('custom.need_admin'));
           }
        }
        return redirect('/');
    }
}
