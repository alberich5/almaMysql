<?php

namespace Omar\Http\Controllers\admin;

use Illuminate\Http\Request;
use Omar\Http\Controllers\Controller;
use Omar\Http\Requests;
use Omar\Categoria;
use Omar\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Omar\Http\Requests\CategoriaFormRequest;
use DB;


class CategoriaController extends Controller
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
            $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idcategoria','desc')
            ->paginate(7);
            return view('admin.almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }

    //Funcion para crear una  nueva categoria
    public function create()
    {
        //mostrar vista de crear
        return view("admin.almacen.categoria.create");
    }
    public function store (CategoriaFormRequest $request)
    {
        //creo objeto de validacion tipo categoria
        $categoria=new Categoria;
        $categoria->nombre=strtoupper($request->get('nombre'));
        $categoria->descripcion=strtoupper($request->get('descripcion'));
        $categoria->condicion='1';
        $categoria->save();

        //guardo el log de actividad
         $log=new Log;
          $log->id_user=Auth::user()->id;
          $log->tipo='Entrada_Categoria';
          $log->save();

        return Redirect::to('almacen-categoria');

    }

    //funcion para mostrar las categorias
    public function show($id)
    {
        return view("admin.almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }

    //funcion para editar las categorias
    public function edit($id)
    {
        return view("admin.almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }

    //funcion para actualizar las categorias
    public function update(CategoriaFormRequest $request,$id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        return Redirect::to('almacen-categoria');
    }

    //funcion para eliminar una categoria
    public function destroy($id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();
        return Redirect::to('almacen-categoria');
    }





}
