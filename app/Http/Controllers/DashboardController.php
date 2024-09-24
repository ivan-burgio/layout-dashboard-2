<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Whatsapp;
use App\Models\Mensaje;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $cantidadBuzon = $this->cantidadBuzon();
        $ticketsPendientes = $this->ticketsPendientes();

        // Pasar los datos a la vista
        return view('dashboard.pages.dashboard', compact('title', 'cantidadBuzon', 'ticketsPendientes'));
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
}
