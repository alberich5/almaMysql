<?php

namespace Omar\Http\Controllers\auxiliar;

use Illuminate\Http\Request;
use Omar\Http\Controllers\Controller;
use Omar\Http\Requests;
use Omar\Persona;
use Illuminate\Support\Facades\Redirect;
use Omar\Http\Requests\PersonaFormRequest;
use DB;

class ProveedorController extends Controller
{
	//constructor
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
            ->where ('tipo_persona','=','Proveedor')
            ->orwhere('num_documento','LIKE','%'.$query.'%')
            ->where ('tipo_persona','=','Proveedor')
            ->orderBy('idpersona','desc')
            ->paginate(7);
            return view('auxiliar.compras.proveedor.index',["personas"=>$personas,"searchText"=>$query]);
        }
    }

    //Metodo para mostrar la vista de crear un proveedor
    public function create()
    {
        return view("auxiliar.compras.proveedor.create");
    }

    //funcion que permite guaradar un proveedor
    public function store (PersonaFormRequest $request)
    {
        $persona=new Persona;
        $persona->tipo_persona='Proveedor';
        $persona->nombre=strtoupper($request->get('nombre'));
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->direccion=strtoupper($request->get('direccion'));
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');        
        $persona->save();
        return Redirect::to('almacen-proveedor');

    }

    //funcion para mostrar todos los proveedores
    public function show($id)
    {
        return view("auxiliar.compras.proveedor.show",["persona"=>Persona::findOrFail($id)]);
    }

    //funcion para editar cada proveedor
     public function edit($id)
    {
        return view("auxiliar.compras.proveedor.edit",["persona"=>Persona::findOrFail($id)]);
    }

    //funcion para actualizar la informacion de algun proveedor
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
        return Redirect::to('almacen-proveedor');
    }

    //funcion para destruir algun provedor
    public function destroy($id)
    {
        $persona=Persona::findOrFail($id);
        $persona->tipo_persona='Inactivo';
        $persona->update();
        return Redirect::to('almacen-proveedor');
    }
}
