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

    public function store(Request $request, $id = null)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mensaje' => 'required|string',
        ]);

        try {
            if ($id) {
                // Actualiza el registro existente
                $email = Email::findOrFail($id);
                $email->update($validated);
            } else {
                // Crea un nuevo registro
                Email::create($validated);
            }

            return redirect()->route('emails')->with('success', 'Email guardado exitosamente!');
        } catch (\Exception $e) {
            // Maneja el error y muestra un mensaje
            return redirect()->route('emails')->with('error', 'Hubo un problema al guardar el email.');
        }
    }

    public function whatsapp()
    {
        $title = 'WhatsApps';

        return view('dashboard.pages.buzon.whatsapp', compact('title'));
    }
}
