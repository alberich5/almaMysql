<?php

namespace Omar\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Omar\User;
use Omar\UsuarioRol;
use Closure;
use Session;

class Responsable
{
    /**
     * Handle an incoming request.
     *
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
                return redirect()->to('admin')->with('redirectPath', '/admin/almacen-venta');
               break;
            case '2':
               # Responsable de agregar productos
                #return  redirect()->to('responsable');
               break;
            default:
            dd("No se encontro nada");
              break;
           
       }
       return $next($request);
    }
}
