<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class BuzonController extends Controller
{
    public function websBuzon()
    {
        $mensajes = Mensaje::all();

        $title = 'Mensajes Web';

        return view('dashboard.pages.buzon.webs', compact('mensajes'), compact('title'));
    }

    public function emails()
    {
        $title = 'Emails';

        return view('dashboard.pages.buzon.emails', compact('title'));
    }

    public function whatsapp()
    {
        $title = 'WhatsApps';

        return view('dashboard.pages.buzon.whatsapp', compact('title'));
    }
}
