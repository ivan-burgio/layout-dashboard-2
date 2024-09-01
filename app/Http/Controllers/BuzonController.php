<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\Email;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class BuzonController extends Controller
{
    public function websMensaje(Request $request)
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

    public function websMensajeStore(Request $request)
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

    public function updateWebMensajeEstado(Request $request, $id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->estado = $request->input('estado');
        $mensaje->save();

        return redirect()->route('webs')->with('success', 'El estado del mensaje web ha sido actualizado.');
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

    public function updateEmailEstado(Request $request, $id)
    {
        $email = Email::findOrFail($id);
        $email->estado = $request->input('estado');
        $email->save();

        return redirect()->route('emails')->with('success', 'El estado del email ha sido actualizado.');
    }

    public function whatsapps(Request $request)
    {
        $title = 'WhatsApps';
        $query = Whatsapp::query();

        // Filtrado por nombre o número
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nombre', 'like', "%{$search}%")
                ->orWhere('telefono', 'like', "%{$search}%");
        }

        // Ordenamiento
        $orderBy = $request->input('order_by', 'id'); // Campo de ordenación, por defecto 'id'
        $orderDirection = $request->input('order_direction', 'desc'); // Dirección de orden, por defecto 'desc'

        $whatsapps = $query->orderBy($orderBy, $orderDirection)->get();

        // Pasar los WhatsApps a la vista
        return view('dashboard.pages.buzon.whatsapp', compact('title', 'whatsapps'));
    }

    public function whatsappsStore(Request $request, $id = null)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|numeric|digits_between:1,15',
            'mensaje' => 'required|string',
        ]);

        try {
            if ($id) {
                // Actualiza el registro existente
                $whatsapp = Whatsapp::findOrFail($id);
                $whatsapp->update($validated);
            } else {
                // Crea un nuevo registro
                Whatsapp::create($validated);
            }

            return redirect()->route('whatsapps')->with('success', 'WhatsApp guardado exitosamente!');
        } catch (\Exception $e) {
            // Maneja el error y muestra un mensaje
            return redirect()->route('whatsapps')->with('error', 'Hubo un problema al guardar el WhatsApp.');
        }
    }

    public function updateWhatsappEstado(Request $request, $id)
    {
        $whatsapp = Whatsapp::findOrFail($id);
        $whatsapp->estado = $request->input('estado');
        $whatsapp->save();

        return redirect()->route('whatsapps')->with('success', 'El estado del WhatsApp ha sido actualizado.');
    }
}
