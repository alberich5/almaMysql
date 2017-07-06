<?php

namespace Omar\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Omar\Http\Requests;

class ReporteController extends Controller
{
     //funcion index
    public function index(Request $request)
    {
        return view('admin.reporte.kardex.index');
    }
}
