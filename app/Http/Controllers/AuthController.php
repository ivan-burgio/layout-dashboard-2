<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
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

    public function loginEjemplo(Request $request)
    {
        if ($request->isMethod('post')) {
            // Obtiene los datos del formulario
            $email = $request->input('email');
            $password = $request->input('password');

            // Recorre los usuarios de prueba para verificar credenciales
            foreach ($this->testUsers as $user) {
                if ($user['email'] === $email && $user['password'] === $password) {
                    // Inicia sesión y redirige al dashboard
                    session(['user_logged_in' => true, 'user_email' => $email]);
                    return redirect('/dashboard');
                }
            }

            // Si no coinciden las credenciales, redirige con un error
            return redirect()->back()->withErrors(['email' => 'Credenciales inválidas']);
        }

        // Muestra el formulario de login
        return view('auth.login');
    }

    public function logout()
    {
        // Elimina los datos de la sesión
        session()->flush();

        // Redirige a la página de inicio de sesión o a otra página
        return redirect('/');
    }

    // Datos de prueba para autenticación
    private $testUsers = [
        ['email' => 'admin@example.com', 'password' => 'admin123'],
        ['email' => 'user@example.com', 'password' => 'user123'],
    ];
}
