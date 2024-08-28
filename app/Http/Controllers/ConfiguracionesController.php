<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionesController extends Controller
{
    public function operadores()
    {
        return view('dashboard.pages.configuraciones.operadores');
    }

    public function permisos()
    {
        return view('dashboard.pages.configuraciones.permisos');
    }
}
