<?php

namespace Omar\Http\Controllers\auxiliar;

use Illuminate\Http\Request;

use Omar\Http\Requests;
use Omar\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Omar\Http\Requests\ArticuloFormRequest;
use Omar\Articulo;
use Omar\Log;
use DB;

class ArticuloController extends Controller
{
    //construtor
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    //funcion index
    public function index(Request $request)
    {
        
        if ($request)
        {
            //filtro de busquedas
            $query=trim($request->get('searchText'));
            //condicion
            $articulos=DB::table('articulo as a')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
            ->where('a.nombre','LIKE','%'.$query.'%')
            ->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('a.idarticulo','desc')
            ->paginate(7);
            return view('auxiliar.almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
        }
    }
    //Funcion para la vista de crear un nuevo articulo
    public function create()
    {
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
        //mostrar vista de crear
        return view("auxiliar.almacen.articulo.create",["categorias"=>$categorias]);
    }
    //funcion para insertar un nuevo articulo
    public function store (ArticuloFormRequest $request)
    {
        //creo objeto de validacion tipo categoria
        $articulo=new Articulo;
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=strtoupper($request->get('nombre'));
        $articulo->stock="0";
        $articulo->descripcion=strtoupper($request->get('descripcion'));
        $articulo->marca=strtoupper($request->get('marca'));
        $articulo->unidad=strtoupper($request->get('unidad'));
        $articulo->fecha=$request->get('fecha');
        $articulo->estado='Activo';

        if (Input::hasFile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
        		$articulo->imagen=$file->getClientOriginalName();
        }

        $articulo->save();

        //guardo el log de actividad
         $log=new Log;
          $log->id_user=Auth::user()->id;
          $log->tipo='Entrada_Articulo';
          $log->save();


        return Redirect::to('almacen-articulo');

    }

    //funcion para mostrar todos los articulos
    public function show($id)
    {
        return view("auxiliar.almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }

    //funciojn para editar cada articulo
    public function edit($id)
    {
        $articulo=Articulo::findOrFail($id);
        $categorias=DB::table('categoria')->where('condicion','=','1')->get();
        //retornar la vista
        return view("auxiliar.almacen.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias]);

    }

    //funcion para actualizar la informacion de cada articulo
    public function update(ArticuloFormRequest $request,$id)
    {
         $articulo=Articulo::findOrFail($id);
         $articulo->idcategoria=$request->get('idcategoria');
         $articulo->codigo=$request->get('codigo');
         $articulo->nombre=strtoupper($request->get('nombre'));
         $articulo->descripcion=strtoupper($request->get('descripcion'));
         $articulo->marca=strtoupper($request->get('marca'));
         $articulo->precio=$request->get('precio');
         $articulo->estado='Activo';

         if (Input::hasFile('imagen')){
         	$file=Input::file('imagen');
         	$file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
        	$articulo->imagen=$file->getClientOriginalName();
        }

         $articulo->update();
         return Redirect::to('almacen-articulo');
    }

    //funcion para eliminar cada articulo
    public function destroy($id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->Estado='Inactivo';
        $articulo->update();
         return Redirect::to('almacen-articulo');
    }
}
