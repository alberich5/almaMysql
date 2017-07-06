<?php

namespace Omar\Http\Controllers;

use Illuminate\Http\Request;

use Omar\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Omar\Http\Requests\ArticuloFormRequest;
use Omar\Articulo;
use Omar\Log;
use DB;

class PruebaController extends Controller
{
    public function index(Request $request)
    {
        return "SE encutra del controlador";
    }
}
