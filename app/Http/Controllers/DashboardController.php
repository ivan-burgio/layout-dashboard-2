<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Whatsapp;
use App\Models\Mensaje;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $cantidadBuzon = $this->cantidadBuzon();
        $ticketsPendientes = $this->ticketsPendientes();
        $chartBuzon = $this->chartBuzon();

        // Pasar los datos a la vista
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
        $ticketsPendientes = Ticket::where('estado', 'Pendiente')->get();

        return $ticketsPendientes;
    }

    public function chartBuzon()
    {
        // Obtiene los datos agrupados por fecha para cada tipo de mensaje
        $emailsPorDia = Email::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date');

        $mensajesWebPorDia = Mensaje::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date');

        $whatsappPorDia = Whatsapp::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date');

        // Prepara los datos para el gráfico
        $labels = $emailsPorDia->keys()->merge($mensajesWebPorDia->keys())->merge($whatsappPorDia->keys())->unique()->values();

        $chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Emails',
                    'data' => $labels->map(function ($date) use ($emailsPorDia) {
                        return $emailsPorDia->get($date, 0); // Retorna 0 si no hay datos
                    }),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                ],
                [
                    'label' => 'Mensajes Web',
                    'data' => $labels->map(function ($date) use ($mensajesWebPorDia) {
                        return $mensajesWebPorDia->get($date, 0); // Retorna 0 si no hay datos
                    }),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                ],
                [
                    'label' => 'WhatsApp',
                    'data' => $labels->map(function ($date) use ($whatsappPorDia) {
                        return $whatsappPorDia->get($date, 0); // Retorna 0 si no hay datos
                    }),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];

        // Retorna los datos al gráfico
        return [
            'chartData' => $chartData,
        ];
    }
}
