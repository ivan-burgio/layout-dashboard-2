<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class AgendaController extends Controller
{
    public function calendario()
    {
        $title = 'Calendario';
        return view('dashboard.pages.agenda.calendario', compact('title'));
    }

    // Método para obtener los eventos en formato JSON
    public function events()
    {
        $events = Event::all(); // Reemplaza esto con la lógica para obtener los eventos según tu modelo
        return response()->json($events);
    }

    // Método para almacenar un nuevo evento
    public function store(Request $request)
    {
        // Validar datos recibidos
        $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'nullable|date|after_or_equal:start',
        ]);

        try {
            // Crear evento
            $event = Event::create([
                'title' => $request->input('title'),
                'start' => $request->input('start'),
                'end' => $request->input('end'),
            ]);

            // Devolver respuesta de éxito con el evento creado
            return response()->json([
                'success' => 'Evento creado con éxito',
                'event' => $event,
            ]);
        } catch (\Exception $e) {
            // En caso de error, devolver un mensaje
            return response()->json([
                'error' => 'Error al crear el evento',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    // Método para actualizar un evento
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'nullable|date|after_or_equal:start',
            'color' => 'nullable|string|max:7', // Asegúrate de que el color sea una cadena válida
        ]);

        $event = Event::findOrFail($id);
        $event->update([
            'title' => $request->input('title'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'color' => $request->input('color'), // Actualizar el color
        ]);

        return response()->json(['success' => 'Evento actualizado con éxito', 'event' => $event]);
    }

    // Método para eliminar un evento
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['success' => 'Evento eliminado con éxito']);
    }

    public function tickets()
    {
        $title = 'Tickets';
        return view('dashboard.pages.agenda.tickets', compact('title'));
    }

    public function reuniones()
    {
        $title = 'Reuniones';
        return view('dashboard.pages.agenda.reuniones', compact('title'));
    }
}
