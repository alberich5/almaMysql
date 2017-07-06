<?php

namespace Omar\Http\Controllers\auxiliar;

use Illuminate\Http\Request;
use Omar\Http\Controllers\Controller;
use Omar\Http\Requests;

class ReporteController extends Controller
{
     //funcion index
    public function index(Request $request)
    {
        return view('auxiliar.reporte.kardex.index');
    }
}
