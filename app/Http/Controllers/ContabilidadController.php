<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContabilidadController extends Controller
{
    public function pagos()
    {
        return view('dashboard.pages.contabilidad.pagos');
    }

    public function documentos()
    {
        return view('dashboard.pages.contabilidad.documentos');
    }

    public function gastos()
    {
        return view('dashboard.pages.contabilidad.gastos');
    }

    public function facturas()
    {
        return view('dashboard.pages.contabilidad.facturas');
    }
}
