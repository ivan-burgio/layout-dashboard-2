<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Verifica si es una solicitud POST
        if ($request->isMethod('post')) {
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

            $email = $request->input('email');
            $password = $request->input('password');

            // Datos de prueba para el usuario
            $usuarios = [
                [
                    'email' => 'admin@admin.com',
                    'password' => 'admin1234',
                ]
            ];

            // URL de redirección predefinida
            $redirectUrl = '/dashboard';

            // Verificación de credenciales
            foreach ($usuarios as $usuario) {
                if ($usuario['email'] === $email && $usuario['password'] === $password) {
                    // Guardar el inicio de sesión en la sesión
                    session(['user_logged_in' => true, 'user_email' => $email]);

                    // Redirige a la URL del usuario
                    return redirect($redirectUrl);
                }
            }

            // Si las credenciales no son válidas, devolver un error
            return redirect()->back()
                ->withErrors(['msg' => 'Credenciales incorrectas'])
                ->withInput();
        }

        // Muestra el formulario de login si no es una solicitud POST
        return view('auth.login');
    }

    public function logout()
    {
        // Elimina los datos de la sesión
        session()->flush();

        // Redirige a la página de inicio de sesión o a otra página
        return redirect('/login');
    }

    // -------------------- METODOS CON BASE DE DATOS -------------------

    /* public function login(Request $request)
    {
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
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Redirige a la URL del usuario
            return redirect()->intended('/dashboard');
        }
    }

    public function logout()
    {
        // Cierra la sesión del usuario
        Auth::logout();

        // Redirige a la página de inicio de sesión o a otra página
        return redirect('/login');
    } */
}
