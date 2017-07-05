<?php

namespace Omar\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Omar\User;
use Session;

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
    protected $auth;
    protected $redirectPath;
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            switch ($this->auth->user()->idrol) {
           case '1':
               # Administrador
                #return  redirect()->to('admin');
               break;
            case '2':
               # Responsable de agregar productos
                #return  redirect()->to('responsable');
                 return redirect()->to('admin')->with('redirectPath', '/');
               break;
            default:
            dd("NO se encontro la pagina solicitada");
                break;
           
       }



         //return redirect('/almacen-venta');


        }

        return $next($request);
    }
}
