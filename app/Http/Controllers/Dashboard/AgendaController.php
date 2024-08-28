<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function tickets()
    {
        return view('dashboard.agenda.tickets');
    }

    public function reuniones()
    {
        return view('dashboard.agenda.reuniones');
    }
}
