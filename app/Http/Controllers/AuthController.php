<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Maneja el inicio de sesión con credenciales de prueba.
     */
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Obtener las credenciales de prueba
        $usuarios = collect(User::usersEjemplo());

        // Buscar un usuario con las credenciales proporcionadas
        $usuario = $usuarios->first(function ($user) use ($request) {
            return $user['email'] === $request->email && $user['password'] === $request->password;
        });

        if ($usuario) {
            // Guardar los datos del usuario en la sesión
            Session::put('user', $usuario);

            return redirect()->route('dashboard')->with('success', 'Inicio de sesión exitoso como administrador.');
        }

        // Redirigir con error si las credenciales no son válidas
        return back()->withErrors(['email' => 'Las credenciales no son válidas.']);
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login')->with('success', 'Has cerrado sesión correctamente.');
    }

    /*
    public function login(Request $request)
    {
        // Verifica si es una solicitud POST
        if ($request->isMethod('post')) {
            $email = $request->input('email');

            // Define los mensajes personalizados para la validación
            $messages = [
                'email.required' => 'Ingresa tu correo electrónico.',
                'email.email' => 'El correo electrónico debe ser una dirección válida.',
                'password.required' => 'Ingresa tu contraseña.',
            ];

            // Valida los datos del formulario
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ], $messages);

            // Intenta autenticar al usuario
            if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ])) {
                // Guardar el inicio de sesión en la sesión
                session(['user_logged_in' => true, 'user_email' => $email]);

                // Redirige a la URL del usuario
                return redirect()->intended('/dashboard');
            }

            // Si las credenciales son inválidas, redirige de vuelta con un error
            return redirect()->back()->withErrors(['email' => 'Credenciales inválidas']);
        }

        // Muestra el formulario de login si no es una solicitud POST
        return view('auth.login');
    }

    public function logout()
    {
        // Elimina los datos de la sesión
        session()->flush();

        // Redirige a la página de inicio de sesión o a otra página
        return redirect('/');
    }
    */
}
