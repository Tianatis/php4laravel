<?php

namespace App\Http\Middleware;

use Closure;

class IsInAdminPanel
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

        if(strpos($request->getPathInfo(), config('app.admin_panel_keyword')))
           return true;

        return $next($request);
    }
}
