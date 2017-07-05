<?php

namespace Omar\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Omar\User;
use Omar\UsuarioRol;
use Closure;
use Session;


class Administrador
{
    /**
     * Handle an incoming request.
     *Administrador
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $auth;
    protected $redirectPath;
    public function __construct(Guard $auth)
    {
        $this->auth=$auth;
    }

    public function handle($request, Closure $next)
    {
       switch ($this->auth->user()->idrol) {
           case '1':
               # Administrador
                #return  redirect()->to('admin');
               break;
            case '2':
               # Responsable de agregar productos
                #return  redirect()->to('responsable');
                 return redirect()->to('responsable')->with('redirectPath', '/responsable/almacen-venta');
               break;
           
       }
       return $next($request);
    }
}
