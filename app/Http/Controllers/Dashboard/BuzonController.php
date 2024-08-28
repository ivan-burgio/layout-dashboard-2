<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuzonController extends Controller
{
    public function websBuzon()
    {
        return view('dashboard.buzon.webs');
    }

    public function emails()
    {
        return view('dashboard.buzon.emails');
    }

    public function whatsapp()
    {
        return view('dashboard.buzon.whatsapp');
    }
}
