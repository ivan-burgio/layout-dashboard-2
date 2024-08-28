<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContabilidadController extends Controller
{
    public function pagos()
    {
        return view('dashboard.contabilidad.pagos');
    }

    public function documentos()
    {
        return view('dashboard.contabilidad.documentos');
    }

    public function gastos()
    {
        return view('dashboard.contabilidad.gastos');
    }

    public function facturas()
    {
        return view('dashboard.contabilidad.facturas');
    }
}
