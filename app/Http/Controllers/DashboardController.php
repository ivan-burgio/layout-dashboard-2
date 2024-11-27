<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Email;
use App\Models\Layout;
use App\Models\Pagina;
use App\Models\Ticket;
use App\Helpers\Helper;
use App\Models\Cliente;
use App\Models\Mensaje;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Dashboard';

        $totalClientes = $this->clientes();
        $totalPaginas = $this->paginas();
        $totalLayouts = $this->layouts();
        $cantidadBuzon = $this->cantidadBuzon();
        $ticketsPendientes = $this->ticketsPendientes();
        $mensajesPendientes = $this->mensajesPendientes();

        $filter = $request->input('filter', 'all'); // Obtener filtro o 'all' por defecto
        $chartBuzon = $this->chartBuzon($filter); // Obtener datos del gráfico filtrados

        // Verificar si la petición es AJAX
        if ($request->ajax()) {
            // Retornar solo los datos del gráfico para la respuesta AJAX
            return response()->json(['chartData' => $chartBuzon['chartData']]);
        }

        // Pasar los datos a la vista si no es AJAX
        return view('dashboard.pages.dashboard', compact('title', 'totalLayouts', 'totalClientes', 'totalPaginas', 'cantidadBuzon', 'ticketsPendientes', 'mensajesPendientes', 'chartBuzon'));
    }

    public function clientes()
    {
        // Usar los datos de ejemplo de clientes
        return count(Cliente::clientesEjemplo());
    }

    public function paginas()
    {
        // Usar los datos de ejemplo de páginas
        return count(Pagina::paginasEjemplo());
    }

    public function layouts()
    {
        // Usar los datos de ejemplo de layouts
        return count(Layout::layoutsEjemplo());
    }

    public function cantidadBuzon()
    {
        // Obtener las cantidades de cada tipo de consulta usando los datos de ejemplo
        $totalEmails = count(Email::emailsEjemplo());
        $totalWhatsapps = count(Whatsapp::whatsappsEjemplo());
        $totalMensajesWeb = count(Mensaje::mensajesEjemplo());

        // Calcular el total general de consultas
        $totalConsultas = $totalEmails + $totalWhatsapps + $totalMensajesWeb;

        // Calcular porcentajes usando la función helper
        $porcentajeEmails = Helper::calcularPorcentaje($totalConsultas, $totalEmails);
        $porcentajeWhatsapps = Helper::calcularPorcentaje($totalConsultas, $totalWhatsapps);
        $porcentajeMensajesWeb = Helper::calcularPorcentaje($totalConsultas, $totalMensajesWeb);

        // Retornar un array con los datos
        return [
            'totalEmails' => $totalEmails,
            'totalWhatsapps' => $totalWhatsapps,
            'totalMensajesWeb' => $totalMensajesWeb,
            'porcentajeEmails' => $porcentajeEmails,
            'porcentajeWhatsapps' => $porcentajeWhatsapps,
            'porcentajeMensajesWeb' => $porcentajeMensajesWeb,
        ];
    }

    public function ticketsPendientes()
    {
        // Usar los datos de ejemplo de tickets
        return Ticket::ticketsEjemplo();
    }

    public function mensajesPendientes()
    {
        // Obtener los mensajes pendientes de las diferentes fuentes usando los datos de ejemplo
        $emails = collect(Email::emailsEjemplo());
        $webs = collect(Mensaje::mensajesEjemplo());
        $whatsapps = collect(Whatsapp::whatsappsEjemplo());

        // Unificar los datos de los mensajes en una sola colección
        $mensajesPendientes = collect();

        foreach ($emails as $email) {
            $mensajesPendientes->push((object)[
                'mensaje' => $email['mensaje'],
                'created_at' => $email['created_at'],
                'tipo' => 'Email'
            ]);
        }

        foreach ($webs as $web) {
            $mensajesPendientes->push((object)[
                'mensaje' => $web['mensaje'],
                'created_at' => $web['created_at'],
                'tipo' => 'Web'
            ]);
        }

        foreach ($whatsapps as $whatsapp) {
            $mensajesPendientes->push((object)[
                'mensaje' => $whatsapp['mensaje'],
                'created_at' => $whatsapp['created_at'],
                'tipo' => 'Whatsapp'
            ]);
        }

        // Ordenar los mensajes por fecha (descendente)
        $mensajesPendientes = $mensajesPendientes->sortByDesc('created_at');

        // Limitar a los primeros 10 mensajes
        $mensajesPendientes = $mensajesPendientes->take(10);

        // Pasar la colección de mensajes a la vista
        return $mensajesPendientes;
    }

    public function chartBuzon($filter = 'all')
    {
        // Filtro de fechas basado en el filtro seleccionado
        switch ($filter) {
            case 'day':
                $startDate = Carbon::today();
                break;
            case 'month':
                $startDate = Carbon::now()->subMonth();
                break;
            case 'year':
                $startDate = Carbon::now()->subYear();
                break;
            default:
                $startDate = null; // Todos los registros si no se selecciona filtro
        }

        // Obtener los datos de ejemplo
        $emails = collect(Email::emailsEjemplo());
        $mensajesWeb = collect(Mensaje::mensajesEjemplo());
        $whatsapps = collect(Whatsapp::whatsappsEjemplo());

        // Filtrar por la fecha de creación según el filtro
        if ($startDate) {
            $emails = $emails->where('fecha', '>=', $startDate);
            $mensajesWeb = $mensajesWeb->where('fecha', '>=', $startDate);
            $whatsapps = $whatsapps->where('fecha', '>=', $startDate);
        }

        // Agrupar por fecha
        $emailsPorDia = $emails->groupBy(fn($email) => Carbon::parse($email['created_at'])->toDateString())->map->count();
        $mensajesWebPorDia = $mensajesWeb->groupBy(fn($mensaje) => Carbon::parse($mensaje['created_at'])->toDateString())->map->count();
        $whatsappPorDia = $whatsapps->groupBy(fn($whatsapp) => Carbon::parse($whatsapp['created_at'])->toDateString())->map->count();


        // Combinar las fechas y preparar los datos del gráfico
        $labels = $emailsPorDia->keys()
            ->merge($mensajesWebPorDia->keys())
            ->merge($whatsappPorDia->keys())
            ->unique()
            ->sort()
            ->values(); // Asegurar que las fechas están ordenadas cronológicamente

        $chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Emails',
                    'data' => $labels->map(fn($date) => $emailsPorDia->get($date, 0)),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 0, 39, 1)',
                    'borderWidth' => 2,
                ],
                [
                    'label' => 'Mensajes Web',
                    'data' => $labels->map(fn($date) => $mensajesWebPorDia->get($date, 0)),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(0, 188, 255, 1)',
                    'borderWidth' => 2,
                ],
                [
                    'label' => 'WhatsApp',
                    'data' => $labels->map(fn($date) => $whatsappPorDia->get($date, 0)),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(0, 255, 56, 1)',
                    'borderWidth' => 2,
                ],
            ],
        ];

        // Retornar los datos del gráfico
        return [
            'chartData' => $chartData,
        ];
    }

    /*
    public function clientes()
    {
        return Cliente::count();
    }

    public function paginas()
    {
        return Pagina::count();
    }

    public function layouts()
    {
        return Layout::count();
    }

    public function cantidadBuzon()
    {
        // Obtener las cantidades de cada tipo de consulta
        $totalEmails = Email::count();
        $totalWhatsapps = Whatsapp::count();
        $totalMensajesWeb = Mensaje::count();

        // Calcular el total general de consultas
        $totalConsultas = $totalEmails + $totalWhatsapps + $totalMensajesWeb;

        // Calcular porcentajes usando la función helper
        $porcentajeEmails = Helper::calcularPorcentaje($totalConsultas, $totalEmails);
        $porcentajeWhatsapps = Helper::calcularPorcentaje($totalConsultas, $totalWhatsapps);
        $porcentajeMensajesWeb = Helper::calcularPorcentaje($totalConsultas, $totalMensajesWeb);

        // Retornar un array con los datos
        return [
            'totalEmails' => $totalEmails,
            'totalWhatsapps' => $totalWhatsapps,
            'totalMensajesWeb' => $totalMensajesWeb,
            'porcentajeEmails' => $porcentajeEmails,
            'porcentajeWhatsapps' => $porcentajeWhatsapps,
            'porcentajeMensajesWeb' => $porcentajeMensajesWeb,
        ];
    }

    public function ticketsPendientes()
    {
        // Obtener los tickets que están pendientes
        return Ticket::where('estado', 'Pendiente')->get();
    }

    public function mensajesPendientes()
    {
        // Obtener los mensajes pendientes de las diferentes fuentes
        $emails = Email::where('estado', 'Pendiente')->get();
        $webs = Mensaje::where('estado', 'Pendiente')->get();
        $whatsapps = Whatsapp::where('estado', 'Pendiente')->get();

        // Unificar los datos de los mensajes en una sola colección
        $mensajesPendientes = collect();

        foreach ($emails as $email) {
            $mensajesPendientes->push((object)[
                'mensaje' => $email->mensaje,
                'created_at' => $email->created_at,
                'tipo' => 'Email'
            ]);
        }

        foreach ($webs as $web) {
            $mensajesPendientes->push((object)[
                'mensaje' => $web->mensaje,
                'created_at' => $web->created_at,
                'tipo' => 'Web'
            ]);
        }

        foreach ($whatsapps as $whatsapp) {
            $mensajesPendientes->push((object)[
                'mensaje' => $whatsapp->mensaje,
                'created_at' => $whatsapp->created_at,
                'tipo' => 'Whatsapp'
            ]);
        }

        // Ordenar los mensajes por fecha (descendente)
        $mensajesPendientes = $mensajesPendientes->sortByDesc('created_at');

        // Limitar a los primeros 10 mensajes
        $mensajesPendientes = $mensajesPendientes->take(10);

        // Pasar la colección de mensajes a la vista
        return $mensajesPendientes;
    }

    public function chartBuzon($filter = 'all')
    {
        // Filtro de fechas basado en el filtro seleccionado
        switch ($filter) {
            case 'day':
                $startDate = Carbon::today();
                break;
            case 'month':
                $startDate = Carbon::now()->subMonth();
                break;
            case 'year':
                $startDate = Carbon::now()->subYear();
                break;
            default:
                $startDate = null; // Todos los registros si no se selecciona filtro
        }

        // Filtrar por la fecha de creación según el filtro
        $emailsQuery = Email::selectRaw('DATE(created_at) as date, COUNT(*) as total')->groupBy('date')->orderBy('date');
        $mensajesQuery = Mensaje::selectRaw('DATE(created_at) as date, COUNT(*) as total')->groupBy('date')->orderBy('date');
        $whatsappQuery = Whatsapp::selectRaw('DATE(created_at) as date, COUNT(*) as total')->groupBy('date')->orderBy('date');

        // Aplicar filtro de fecha si se seleccionó uno
        if ($startDate) {
            $emailsQuery->where('created_at', '>=', $startDate);
            $mensajesQuery->where('created_at', '>=', $startDate);
            $whatsappQuery->where('created_at', '>=', $startDate);
        }

        // Obtener los datos
        $emailsPorDia = $emailsQuery->pluck('total', 'date');
        $mensajesWebPorDia = $mensajesQuery->pluck('total', 'date');
        $whatsappPorDia = $whatsappQuery->pluck('total', 'date');

        // Combinar las fechas y preparar los datos del gráfico
        $labels = $emailsPorDia->keys()
            ->merge($mensajesWebPorDia->keys())
            ->merge($whatsappPorDia->keys())
            ->unique()
            ->sort()
            ->values(); // Asegurar que las fechas están ordenadas cronológicamente

        $chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Emails',
                    'data' => $labels->map(fn($date) => $emailsPorDia->get($date, 0)),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 0, 39, 1)',
                    'borderWidth' => 2,
                ],
                [
                    'label' => 'Mensajes Web',
                    'data' => $labels->map(fn($date) => $mensajesWebPorDia->get($date, 0)),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(0, 188, 255, 1)',
                    'borderWidth' => 2,
                ],
                [
                    'label' => 'WhatsApp',
                    'data' => $labels->map(fn($date) => $whatsappPorDia->get($date, 0)),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(0, 255, 56, 1)',
                    'borderWidth' => 2,
                ],
            ],
        ];

        // Retornar los datos del gráfico
        return [
            'chartData' => $chartData,
        ];
    }
    */
}
