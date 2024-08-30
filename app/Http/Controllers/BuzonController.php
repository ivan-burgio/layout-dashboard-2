<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\Email;
use Illuminate\Http\Request;

class BuzonController extends Controller
{
    public function websBuzon(Request $request)
    {
        $title = 'Mensajes Web';
        $query = Mensaje::query();

        // Filtrado por nombre o email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nombre', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        // Ordenamiento
        $orderBy = $request->input('order_by', 'id'); // Campo de ordenación, por defecto 'id'
        $orderDirection = $request->input('order_direction', 'desc'); // Dirección de orden, por defecto 'desc'

        $mensajes = $query->orderBy($orderBy, $orderDirection)->get();

        return view('dashboard.pages.buzon.webs', compact('mensajes', 'title'));
    }

    public function websBuzonStore(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|string',
        ], [
            'nombre.required' => 'Por favor, ingresa tu nombre.',
            'email.required' => 'Por favor, ingresa tu correo electrónico.',
            'email.email' => 'El correo electrónico ingresado no es válido.',
            'mensaje.required' => 'Por favor, ingresa un mensaje.',
        ]);

        // Guardar en la base de datos
        Mensaje::create($validatedData);

        // Redireccionar con mensaje de éxito
        return redirect()->back()->with('success', 'Mensaje enviado con éxito.');
    }

    public function emails(Request $request)
    {
        $title = 'Emails';
        $query = Email::query();

        // Filtrado por nombre o email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nombre', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        // Ordenamiento
        $orderBy = $request->input('order_by', 'id'); // Campo de ordenación, por defecto 'id'
        $orderDirection = $request->input('order_direction', 'desc'); // Dirección de orden, por defecto 'desc'

        $emails = $query->orderBy($orderBy, $orderDirection)->get();

        // Pasar los correos electrónicos a la vista
        return view('dashboard.pages.buzon.emails', compact('title', 'emails'));
    }

    public function emailsStore(Request $request, $id = null)
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
