<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\Email;
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

        // Recuperar todos los correos electrónicos de la base de datos
        $emails = Email::all();

        // Pasar los correos electrónicos a la vista
        return view('dashboard.pages.buzon.emails', compact('title', 'emails'));
    }

    public function storeEmail(Request $request)
    {
        // Validar los datos entrantes
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mensaje' => 'required|string',
        ]);

        // Crear un nuevo registro de correo electrónico en la base de datos
        Email::create($validatedData);

        // Redirigir a la vista de emails con un mensaje de éxito
        return redirect()->route('emails')->with('success', 'Correo electrónico guardado correctamente.');
    }

    public function createEmail()
    {
        $title = 'Nuevo Email';

        return view('dashboard.pages.buzon.create-email', compact('title'));
    }

    public function whatsapp()
    {
        $title = 'WhatsApps';

        return view('dashboard.pages.buzon.whatsapp', compact('title'));
    }
}
