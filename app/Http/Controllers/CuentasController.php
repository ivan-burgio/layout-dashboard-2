<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Cliente;
use App\Models\Pagina;
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

    // Método para listar las páginas
    public function paginas(Request $request)
    {
        $title = 'Páginas';
        $query = Pagina::query();

        // Filtrado por nombre o tipo
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nombre', 'like', "%{$search}%")
                ->orWhere('tipo', 'like', "%{$search}%");
        }

        $orderBy = $request->input('order_by', 'id');
        $orderDirection = $request->input('order_direction', 'desc');

        $paginas = $query->orderBy($orderBy, $orderDirection)->get();

        return view('dashboard.pages.cuentas.paginas', compact('title', 'paginas'));
    }

    // Método para crear o actualizar una página
    public function paginasStore(Request $request, $id = null)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:50',
            'link' => 'nullable|string|max:255',
            'imagen' => 'nullable|image|max:2048',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'tipo.required' => 'El campo tipo es obligatorio.',
        ]);

        try {
            $userId = Auth::id(); // Obtener el ID del usuario logueado

            if ($id) {
                // Actualiza la página existente
                $pagina = Pagina::findOrFail($id);
                $pagina->update(array_merge($validated, [
                    'user_id' => $userId,
                ]));

                // Maneja la imagen si se proporciona una nueva
                if ($request->hasFile('imagen')) {
                    // Elimina la imagen anterior si existe
                    if ($pagina->imagen && Storage::exists($pagina->imagen)) {
                        Storage::delete($pagina->imagen);
                    }

                    // Guarda la nueva imagen
                    $path = $request->file('imagen')->store('public/imagenes');
                    $validated['imagen'] = $path;
                } else {
                    // Mantén la imagen existente si no se proporciona una nueva
                    if ($pagina->imagen) {
                        $validated['imagen'] = $pagina->imagen;
                    }
                }

                // Actualiza los otros campos
                $pagina->update($validated);
            } else {
                // Crea una nueva página
                if ($request->hasFile('imagen')) {
                    // Guarda la nueva imagen
                    $path = $request->file('imagen')->store('public/imagenes');
                    $validated['imagen'] = $path;
                }

                Pagina::create(array_merge($validated, [
                    'user_id' => $userId,
                ]));
            }

            return redirect()->route('paginas')->with('success', 'Página guardada exitosamente!');
        } catch (\Exception $e) {
            return redirect()->route('paginas')->with('error', 'Hubo un problema al guardar la página: ' . $e->getMessage());
        }
    }

    public function contratos()
    {
        return view('dashboard.pages.cuentas.contratos');
    }
}
