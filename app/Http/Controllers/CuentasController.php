<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuentasController extends Controller
{
    public function clientes()
    {
        return view('dashboard.pages.cuentas.clientes');
    }

    public function paginas()
    {
        return view('dashboard.pages.cuentas.paginas');
    }

    public function contratos()
    {
        return view('dashboard.pages.cuentas.contratos');
    }
}
