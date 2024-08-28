<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionesController extends Controller
{
    public function operadores()
    {
        return view('dashboard.configuraciones.operadores');
    }

    public function permisos()
    {
        return view('dashboard.configuraciones.permisos');
    }
}
