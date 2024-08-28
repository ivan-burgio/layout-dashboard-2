<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutsController extends Controller
{
    public function webs()
    {
        return view('dashboard.pages.layouts.webs');
    }

    public function dashboards()
    {
        return view('dashboard.pages.layouts.dashboards');
    }

    public function chatboxs()
    {
        return view('dashboard.pages.layouts.chatboxs');
    }
}
