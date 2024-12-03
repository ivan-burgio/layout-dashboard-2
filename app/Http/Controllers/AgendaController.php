<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    public function calendario()
    {
        $data = [
            'globos' => [
                ['info' => 'Calendario para agendar y guardar eventos, reuniones o lo que se necesite.'],
                ['info' => 'Botones de guardado o eliminado desactivados para la muestra.'],
            ],
        ];

        $title = 'Calendario';
        $eventos = Event::eventsEjemplo(); // Utilizando datos ficticios del modelo Event
        return view('dashboard.pages.agenda.calendario', compact('title', 'eventos', 'data'));
    }

    public function events()
    {
        // Retornar eventos ficticios en formato JSON usando el método del modelo
        $eventos = Event::eventsEjemplo();
        return response()->json($eventos);
    }

    public function tickets(Request $request)
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

        $title = 'Tickets';
        $tickets = Ticket::ticketsEjemplo(); // Utilizando datos ficticios del modelo Ticket

        // Simular búsqueda si se pasa el parámetro "search"
        if ($request->has('search')) {
            $search = $request->input('search');
            $tickets = array_filter($tickets, function ($ticket) use ($search) {
                return stripos($ticket['titulo'], $search) !== false ||
                    stripos($ticket['descripcion'], $search) !== false;
            });
        }

        // Simular ordenamiento
        $orderBy = $request->input('order_by', 'id');
        $orderDirection = $request->input('order_direction', 'desc');
        $tickets = collect($tickets)->sortBy($orderBy, SORT_REGULAR, $orderDirection === 'desc')->values()->all();

        $usuarios = User::all(); // Obtener todos los usuarios

        return view('dashboard.pages.agenda.tickets', compact('title', 'tickets', 'usuarios', 'data'));
    }
}

/*
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

    public function tickets(Request $request)
    {
        $title = 'Tickets';
        $query = Ticket::query()->with('assignee', 'creator');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('titulo', 'like', "%{$search}%")
                ->orWhere('descripcion', 'like', "%{$search}%");
        }

        $orderBy = $request->input('order_by', 'id');
        $orderDirection = $request->input('order_direction', 'desc');

        $tickets = $query->orderBy($orderBy, $orderDirection)->get();

        // Obtener todos los usuarios para el campo "asignado a"
        $usuarios = User::all();

        // Pasar los usuarios y tickets a la vista
        return view('dashboard.pages.agenda.tickets', compact('title', 'tickets', 'usuarios'));
    }

    public function ticketsStore(Request $request, $id = null)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'estado' => 'nullable|string|max:255',
            'prioridad' => 'nullable|string|in:Baja,Media,Alta',
            'asignado_a' => 'nullable|exists:users,id',
        ]);

        try {
            $userId = Auth::id(); // ID del usuario logueado

            if ($id) {
                // Actualizar el ticket existente
                $ticket = Ticket::findOrFail($id);
                $ticket->update(array_merge($validated, [
                    'creador' => $userId, // Usuario que está editando el ticket
                ]));
            } else {
                // Crear un nuevo ticket
                Ticket::create(array_merge($validated, [
                    'creador' => $userId,
                    'creador' => $userId,
                ]));
            }

            return redirect()->route('tickets')->with('success', '¡Ticket guardado exitosamente!');
        } catch (\Exception $e) {
            return redirect()->route('tickets')->with('error', 'Hubo un problema al guardar el ticket: ' . $e->getMessage());
        }
    }

    public function updateTicket(Request $request, $id)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'estado' => 'required|string|in:Pendiente,Abierto,Cerrado,En Proceso',
            'asignado_a' => 'nullable|exists:users,id',
        ]);

        // Buscar el ticket por ID
        $ticket = Ticket::findOrFail($id);

        // Actualizar el ticket con los datos del formulario
        $ticket->estado = $validated['estado'];
        $ticket->asignado_a = $validated['asignado_a'];

        // Guardar los cambios en la base de datos
        $ticket->save();

        // Redirigir o devolver una respuesta adecuada
        return redirect()->back()->with('success', 'Ticket actualizado correctamente.');
    }
}
*/