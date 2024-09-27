<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Whatsapp;
use App\Models\Mensaje;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Dashboard';

        $cantidadBuzon = $this->cantidadBuzon();
        $ticketsPendientes = $this->ticketsPendientes();

        $filter = $request->input('filter', 'all'); // Obtener filtro o 'all' por defecto
        $chartBuzon = $this->chartBuzon($filter); // Obtener datos del gráfico filtrados

        // Verificar si la petición es AJAX
        if ($request->ajax()) {
            // Retornar solo los datos del gráfico para la respuesta AJAX
            return response()->json(['chartData' => $chartBuzon['chartData']]);
        }

        // Pasar los datos a la vista si no es AJAX
        return view('dashboard.pages.dashboard', compact('title', 'cantidadBuzon', 'ticketsPendientes', 'chartBuzon'));
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
}
