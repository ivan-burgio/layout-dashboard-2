<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LayoutsController extends Controller
{
    // Método para listar layouts de tipo 'web'
    public function webs(Request $request)
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

        $title = 'Layouts Web';
        $tipo = 'webs';
        $layouts = Layout::layoutsEjemplo(); // Obtener datos ficticios

        // Filtrar por categoría 'Web'
        $layouts = array_filter($layouts, function ($layout) {
            return strtolower($layout['categoria']) === 'web';
        });

        // Filtrar por búsqueda
        if ($request->has('search')) {
            $search = $request->input('search');
            $layouts = array_filter($layouts, function ($layout) use ($search) {
                return stripos($layout['nombre'], $search) !== false ||
                    stripos($layout['descripcion'], $search) !== false;
            });
        }

        return view('dashboard.pages.layouts.layouts', compact('title', 'layouts', 'tipo', 'data'));
    }

    // Método para listar layouts de tipo 'dashboard'
    public function dashboards(Request $request)
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

        $title = 'Layouts Dashboard';
        $tipo = 'dashboards';
        $layouts = Layout::layoutsEjemplo(); // Obtener datos ficticios

        // Filtrar por categoría 'Dashboard'
        $layouts = array_filter($layouts, function ($layout) {
            return strtolower($layout['categoria']) === 'dashboard';
        });

        // Filtrar por búsqueda
        if ($request->has('search')) {
            $search = $request->input('search');
            $layouts = array_filter($layouts, function ($layout) use ($search) {
                return stripos($layout['nombre'], $search) !== false ||
                    stripos($layout['descripcion'], $search) !== false;
            });
        }

        return view('dashboard.pages.layouts.layouts', compact('title', 'layouts', 'tipo', 'data'));
    }

    // Método para listar layouts de tipo 'chatbot'
    public function chatbots(Request $request)
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

        $title = 'Layouts Chatbot';
        $tipo = 'chatbots';
        $layouts = Layout::layoutsEjemplo(); // Obtener datos ficticios

        // Filtrar por categoría 'Chatbot'
        $layouts = array_filter($layouts, function ($layout) {
            return strtolower($layout['categoria']) === 'chatbot';
        });

        // Filtrar por búsqueda
        if ($request->has('search')) {
            $search = $request->input('search');
            $layouts = array_filter($layouts, function ($layout) use ($search) {
                return stripos($layout['nombre'], $search) !== false ||
                    stripos($layout['descripcion'], $search) !== false;
            });
        }

        return view('dashboard.pages.layouts.layouts', compact('title', 'layouts', 'tipo', 'data'));
    }
}

/*
class LayoutsController extends Controller
{
    // Método para listar layouts de tipo 'web'
    public function webs(Request $request)
    {
        $title = 'Layouts Web';
        $query = Layout::where('categoria', 'web');
        $tipo = 'webs';

        // Filtrado por nombre o tipo
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                    ->orWhere('tipo', 'like', "%{$search}%");
            });
        }

        // Ordenar resultados
        $orderBy = $request->input('order_by', 'id');
        $orderDirection = $request->input('order_direction', 'desc');

        $layouts = $query->orderBy($orderBy, $orderDirection)->get();

        return view('dashboard.pages.layouts.layouts', compact('title', 'layouts', 'tipo'));
    }

    // Método para crear o actualizar un layout de tipo 'web'
    public function websStore(Request $request, $id = null)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'link' => 'nullable|string|max:255',
            'imagen' => 'nullable|image|max:2048',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
        ]);

        try {
            $userId = Auth::id(); // Obtener el ID del usuario logueado

            $validated['tipo'] = 'web';

            if ($id) {
                // Actualizar layout existente
                $layout = Layout::findOrFail($id);
                $layout->update(array_merge($validated, [
                    'creador' => $userId,
                    'categoria' => 'web',
                ]));

                // Manejar imagen si se proporciona una nueva
                if ($request->hasFile('imagen')) {
                    if ($layout->imagen && Storage::exists($layout->imagen)) {
                        Storage::delete($layout->imagen);
                    }
                    $path = $request->file('imagen')->store('public/imagenes');
                    $validated['imagen'] = $path;
                } else {
                    if ($layout->imagen) {
                        $validated['imagen'] = $layout->imagen;
                    }
                }

                $layout->update($validated);
            } else {
                // Crear nuevo layout
                if ($request->hasFile('imagen')) {
                    $path = $request->file('imagen')->store('public/imagenes');
                    $validated['imagen'] = $path;
                }

                Layout::create(array_merge($validated, [
                    'creador' => $userId,
                    'categoria' => 'web',
                ]));
            }

            return redirect()->route('webs')->with('success', 'Layout web guardado exitosamente!');
        } catch (\Exception $e) {
            return redirect()->route('webs')->with('error', 'Hubo un problema al guardar el layout: ' . $e->getMessage());
        }
    }

    // Método para listar layouts de tipo 'dashboard'
    public function dashboards(Request $request)
    {
        $title = 'Layouts Dashboard';
        $query = Layout::where('categoria', 'dashboard');
        $tipo = 'dashboards';

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                    ->orWhere('tipo', 'like', "%{$search}%");
            });
        }

        $orderBy = $request->input('order_by', 'id');
        $orderDirection = $request->input('order_direction', 'desc');

        $layouts = $query->orderBy($orderBy, $orderDirection)->get();

        return view('dashboard.pages.layouts.layouts', compact('title', 'layouts', 'tipo'));
    }

    // Método para crear o actualizar un layout de tipo 'dashboard'
    public function dashboardsStore(Request $request, $id = null)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'link' => 'nullable|string|max:255',
            'imagen' => 'nullable|image|max:2048',
        ]);

        try {
            $userId = Auth::id();
            $validated['tipo'] = 'dashboard';

            if ($id) {
                $layout = Layout::findOrFail($id);
                $layout->update(array_merge($validated, [
                    'creador' => $userId,
                    'categoria' => 'dashboard',
                ]));

                if ($request->hasFile('imagen')) {
                    if ($layout->imagen && Storage::exists($layout->imagen)) {
                        Storage::delete($layout->imagen);
                    }
                    $path = $request->file('imagen')->store('public/imagenes');
                    $validated['imagen'] = $path;
                } else {
                    if ($layout->imagen) {
                        $validated['imagen'] = $layout->imagen;
                    }
                }

                $layout->update($validated);
            } else {
                if ($request->hasFile('imagen')) {
                    $path = $request->file('imagen')->store('public/imagenes');
                    $validated['imagen'] = $path;
                }

                Layout::create(array_merge($validated, [
                    'creador' => $userId,
                    'categoria' => 'dashboard',
                ]));
            }

            return redirect()->route('dashboards')->with('success', 'Layout dashboard guardado exitosamente!');
        } catch (\Exception $e) {
            return redirect()->route('dashboards')->with('error', 'Hubo un problema al guardar el layout: ' . $e->getMessage());
        }
    }

    // Método para listar layouts de tipo 'chatbot'
    public function chatbots(Request $request)
    {
        $title = 'Layouts Chatbot';
        $query = Layout::where('categoria', 'chatbot');
        $tipo = 'chatbots';

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                    ->orWhere('tipo', 'like', "%{$search}%");
            });
        }

        $orderBy = $request->input('order_by', 'id');
        $orderDirection = $request->input('order_direction', 'desc');

        $layouts = $query->orderBy($orderBy, $orderDirection)->get();

        return view('dashboard.pages.layouts.layouts', compact('title', 'layouts', 'tipo'));
    }

    // Método para crear o actualizar un layout de tipo 'chatbot'
    public function chatbotsStore(Request $request, $id = null)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'link' => 'nullable|string|max:255',
            'imagen' => 'nullable|image|max:2048',
        ]);

        try {
            $userId = Auth::id();
            $validated['tipo'] = 'chatbot';

            if ($id) {
                $layout = Layout::findOrFail($id);
                $layout->update(array_merge($validated, [
                    'creador' => $userId,
                    'categoria' => 'chatbot',
                ]));

                if ($request->hasFile('imagen')) {
                    if ($layout->imagen && Storage::exists($layout->imagen)) {
                        Storage::delete($layout->imagen);
                    }
                    $path = $request->file('imagen')->store('public/imagenes');
                    $validated['imagen'] = $path;
                } else {
                    if ($layout->imagen) {
                        $validated['imagen'] = $layout->imagen;
                    }
                }

                $layout->update($validated);
            } else {
                if ($request->hasFile('imagen')) {
                    $path = $request->file('imagen')->store('public/imagenes');
                    $validated['imagen'] = $path;
                }

                Layout::create(array_merge($validated, [
                    'creador' => $userId,
                    'categoria' => 'chatbot',
                ]));
            }

            return redirect()->route('chatbots')->with('success', 'Layout chatbot guardado exitosamente!');
        } catch (\Exception $e) {
            return redirect()->route('chatbots')->with('error', 'Hubo un problema al guardar el layout: ' . $e->getMessage());
        }
    }
}
*/