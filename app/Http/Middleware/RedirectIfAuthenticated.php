<?php

namespace Omar\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Omar\User;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            dd(Auth::user()->idrol);
         return redirect('/almacen-venta');
        }

        return $next($request);
    }
}
