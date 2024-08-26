<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;

class MensajeController extends Controller
{
    public function store(Request $request)
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
}
