<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente; // Asegúrate de tener el modelo Cliente
use Illuminate\Support\Facades\Auth;

class CuentasController extends Controller
{
    public function clientes(Request $request)
    {
        $title = 'Clientes';
        $query = Cliente::query()->with('creator');

        // Filtrado por nombre, email o teléfono
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nombre', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('telefono', 'like', "%{$search}%");
        }

        // Ordenamiento
        $orderBy = $request->input('order_by', 'id'); // Campo de ordenación, por defecto 'id'
        $orderDirection = $request->input('order_direction', 'desc'); // Dirección de orden, por defecto 'desc'

        $clientes = $query->orderBy($orderBy, $orderDirection)->get();

        // Pasar los clientes a la vista
        return view('dashboard.pages.cuentas.clientes', compact('title', 'clientes'));
    }

    public function clientesStore(Request $request, $id = null)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|numeric',
            'numero_cuenta_bancaria' => 'required|numeric'
        ]);

        try {
            $userId = Auth::id(); // Obtener el ID del usuario logueado

            if ($id) {
                // Actualiza el registro existente
                $cliente = Cliente::findOrFail($id);
                $cliente->update(array_merge($validated, [
                    'user_id' => $userId,
                ]));
            } else {
                // Crea un nuevo registro
                Cliente::create(array_merge($validated, [
                    'user_id' => $userId,
                    'estado_cambiado_por' => $userId,
                ]));
            }

            return redirect()->route('clientes')->with('success', 'Cliente guardado exitosamente!');
        } catch (\Exception $e) {
            // Maneja el error y muestra un mensaje detallado
            return redirect()->route('clientes')->with('error', 'Hubo un problema al guardar el cliente: ' . $e->getMessage());
        }
    }

    public function updateClienteEstado(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->estado = $request->input('estado');
        $cliente->estado_cambiado_por = Auth::id(); // Registrar el usuario que cambió el estado
        $cliente->save();

        return redirect()->route('clientes')->with('success', 'El estado del cliente ha sido actualizado.');
    }

    // Mantener los otros métodos por si los necesitas
    public function paginas()
    {
        return view('dashboard.pages.cuentas.paginas');
    }

    public function contratos()
    {
        return view('dashboard.pages.cuentas.contratos');
    }
}
