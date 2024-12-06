<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\Email;
use App\Models\Whatsapp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuzonController extends Controller
{
    public function websMensaje(Request $request)
    {
        $data = [
            'globos' => [
                ['info' => 'Formularios personalizados a las necesidades.'],
                ['info' => 'Botones de guardado o eliminado desactivados para la muestra.'],
                ['info' => 'Cantidad de columnas a necesidad.'],
                ['info' => 'Colores y diseños de los elementos al gusto.'],
                ['info' => 'Barra de busqueda y filtros funcionales para facilitar la busqueda de registros.'],
            ],
        ];

        $title = 'Mensajes Web';
        $mensajes = Mensaje::mensajesEjemplo(); // Obtener datos ficticios

        // Filtrar por búsqueda
        if ($request->has('search')) {
            $search = $request->input('search');
            $mensajes = array_filter($mensajes, function ($mensaje) use ($search) {
                return stripos($mensaje['nombre'], $search) !== false ||
                    stripos($mensaje['email'], $search) !== false;
            });
        }

        return view('dashboard.pages.buzon.messages_webs', compact('title', 'mensajes', 'data'));
    }

    public function emails(Request $request)
    {
        $data = [
            'globos' => [
                ['info' => 'Formularios personalizados a las necesidades.'],
                ['info' => 'Botones de guardado o eliminado desactivados para la muestra.'],
                ['info' => 'Cantidad de columnas a necesidad.'],
                ['info' => 'Colores y diseños de los elementos al gusto.'],
                ['info' => 'Barra de busqueda y filtros funcionales para facilitar la busqueda de registros.'],
            ],
        ];

        $title = 'Emails';
        $emails = Email::emailsEjemplo(); // Obtener datos ficticios

        // Filtrar por búsqueda
        if ($request->has('search')) {
            $search = $request->input('search');
            $emails = array_filter($emails, function ($email) use ($search) {
                return stripos($email['nombre'], $search) !== false ||
                    stripos($email['email'], $search) !== false;
            });
        }

        return view('dashboard.pages.buzon.emails', compact('title', 'emails', 'data'));
    }

    public function whatsapps(Request $request)
    {
        $data = [
            'globos' => [
                ['info' => 'Formularios personalizados a las necesidades.'],
                ['info' => 'Botones de guardado o eliminado desactivados para la muestra.'],
                ['info' => 'Cantidad de columnas a necesidad.'],
                ['info' => 'Colores y diseños de los elementos al gusto.'],
                ['info' => 'Barra de busqueda y filtros funcionales para facilitar la busqueda de registros.'],
            ],
        ];

        $title = 'WhatsApps';
        $whatsapps = Whatsapp::whatsappsEjemplo(); // Obtener datos ficticios

        // Filtrar por búsqueda
        if ($request->has('search')) {
            $search = $request->input('search');
            $whatsapps = array_filter($whatsapps, function ($whatsapp) use ($search) {
                return stripos($whatsapp['nombre'], $search) !== false ||
                    stripos($whatsapp['telefono'], $search) !== false;
            });
        }

        return view('dashboard.pages.buzon.whatsapp', compact('title', 'whatsapps', 'data'));
    }
}

/*
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

        return view('dashboard.pages.buzon.messages_webs', compact('mensajes', 'title'));
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

        // Obtener el ID del usuario logueado
        $userId = Auth::id();

        // Guardar en la base de datos
        Mensaje::create(array_merge($validatedData, [
            'creador' => $userId,
            'estado_cambiado_por' => $userId,
        ]));

        // Redireccionar con mensaje de éxito
        return redirect()->back()->with('success', 'Mensaje enviado con éxito.');
    }

    public function updateWebMensajeEstado(Request $request, $id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->estado = $request->input('estado');
        $mensaje->estado_cambiado_por = Auth::id(); // Registrar el usuario que cambió el estado
        $mensaje->save();

        return redirect()->route('messages_webs')->with('success', 'El estado del mensaje web ha sido actualizado.');
    }

    public function emails(Request $request)
    {
        $title = 'Emails';
        $query = Email::query()->with('creator'); // Usa 'with' para incluir el creador

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
            $userId = Auth::id(); // Obtener el ID del usuario logueado

            if ($id) {
                // Actualiza el registro existente
                $email = Email::findOrFail($id);
                $email->update(array_merge($validated, [
                    'creador' => $userId,
                    'estado_cambiado_por' => $userId,
                ]));
            } else {
                // Crea un nuevo registro
                Email::create(array_merge($validated, [
                    'creador' => $userId,
                    'estado_cambiado_por' => $userId,
                ]));
            }

            return redirect()->route('emails')->with('success', 'Email guardado exitosamente!');
        } catch (\Exception $e) {
            // Maneja el error y muestra un mensaje
            return redirect()->route('emails')->with('error', 'Hubo un problema al guardar el email: ' . $e->getMessage());
        }
    }

    public function updateEmailEstado(Request $request, $id)
    {
        $email = Email::findOrFail($id);
        $email->estado = $request->input('estado');
        $email->estado_cambiado_por = Auth::id(); // Registrar el usuario que cambió el estado
        $email->save();

        return redirect()->route('emails')->with('success', 'El estado del email ha sido actualizado.');
    }

    public function whatsapps(Request $request)
    {
        $title = 'WhatsApps';
        $query = Whatsapp::query()->with('creator');

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
            $userId = Auth::id(); // Obtener el ID del usuario logueado

            if ($id) {
                // Actualiza el registro existente
                $whatsapp = Whatsapp::findOrFail($id);
                $whatsapp->update(array_merge($validated, [
                    'creador' => $userId,
                    'estado_cambiado_por' => $userId,
                ]));
            } else {
                // Crea un nuevo registro
                Whatsapp::create(array_merge($validated, [
                    'creador' => $userId,
                    'estado_cambiado_por' => $userId,
                ]));
            }

            return redirect()->route('whatsapps')->with('success', 'WhatsApp guardado exitosamente!');
        } catch (\Exception $e) {
            // Maneja el error y muestra un mensaje
            return redirect()->route('whatsapps')->with('error', 'Hubo un problema al guardar el WhatsApp: ' . $e->getMessage());
        }
    }

    public function updateWhatsappEstado(Request $request, $id)
    {
        $whatsapp = Whatsapp::findOrFail($id);
        $whatsapp->estado = $request->input('estado');
        $whatsapp->estado_cambiado_por = Auth::id(); // Registrar el usuario que cambió el estado
        $whatsapp->save();

        return redirect()->route('whatsapps')->with('success', 'El estado del WhatsApp ha sido actualizado.');
    }
}
*/