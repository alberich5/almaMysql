<?php

namespace Omar\Http\Controllers\auxiliar;

use Illuminate\Http\Request;
use Omar\Http\Controllers\Controller;
use Omar\Http\Requests;
use Omar\Persona;
use Omar\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Omar\Http\Requests\PersonaFormRequest;
use DB;

class ClienteController extends Controller
{
	//funcion del contruxtor
     public function __construct()
    {
        $this->middleware('auth');
    }

    //funcion del index
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $personas=DB::table('persona')
            ->where('nombre','LIKE','%'.$query.'%')
            ->where ('tipo_persona','=','Cliente')
            ->orwhere('num_documento','LIKE','%'.$query.'%')
            ->where ('tipo_persona','=','Cliente')
            ->orderBy('idpersona','desc')
            ->paginate(7);
            return view('auxiliar.ventas.cliente.index',["personas"=>$personas,"searchText"=>$query]);
        }
    }

    //funcion para mostrar la vista para crear cliente
    public function create()
    {
        return view("auxiliar.ventas.cliente.create");
    }

    //funcion para guardar un nuevo cliente
    public function store (PersonaFormRequest $request)
    {
        $persona=new Persona;
        $persona->tipo_persona='Cliente';
        $persona->nombre=strtoupper($request->get('nombre'));
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->direccion=strtoupper($request->get('direccion'));
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');        
        $persona->save();
         //guardo el log de actividad
         $log=new Log;
          $log->id_user=Auth::user()->id;
          $log->tipo='Entrada_Categoria';
          $log->save();
        return Redirect::to('almacen-cliente');

    }

    //mostrar todos los clientes
    public function show($id)
    {
        return view("auxiliar.ventas.cliente.show",["persona"=>Persona::findOrFail($id)]);
    }

    //Funcion para mostar la vista para editar clientes
    public function edit($id)
    {
        return view("auxiliar.ventas.cliente.edit",["persona"=>Persona::findOrFail($id)]);
    }

    //funcion para actualizar datos del cliente
     public function update(PersonaFormRequest $request,$id)
    {
        $persona=Persona::findOrFail($id);

        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');

        $persona->update();
        return Redirect::to('almacen-cliente');
    }

    //funcion para eliminar cliente
    public function destroy($id)
    {
        $persona=Persona::findOrFail($id);
        $persona->tipo_persona='Inactivo';
        $persona->update();
        return Redirect::to('almacen-cliente');
    }

}
