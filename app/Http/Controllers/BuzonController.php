<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class BuzonController extends Controller
{
    public function websBuzon()
    {
        $mensajes = Mensaje::all();

        return view('dashboard.pages.buzon.webs', compact('mensajes'));
    }

    public function emails()
    {
        return view('dashboard.pages.buzon.emails');
    }

    public function whatsapp()
    {
        return view('dashboard.pages.buzon.whatsapp');
    }
}
