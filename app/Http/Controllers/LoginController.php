<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Datos de prueba para el usuario
        $usuarios = [
            [
                'email' => 'admin@admin.com',
                'password' => 'admin1234',
            ]
        ];

        // URL de redirección predefinida
        $redirectUrl = '/dashboard';

        if ($request->isMethod('post')) {
            $email = $request->input('email');
            $password = $request->input('password');

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
            return redirect()->back()->withErrors(['msg' => 'Credenciales incorrectas']);
        }

        // Muestra el formulario de login
        return view('pages.login');
    }

    public function logout()
    {
        // Elimina los datos de la sesión
        session()->flush();

        // Redirige a la página de inicio de sesión o a otra página
        return redirect('/login');
    }
}
