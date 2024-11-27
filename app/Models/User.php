<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'documento',
        'token',
        'role',
    ];

    /**
     * Los atributos que deben ser ocultados para la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben ser casteados a tipos específicos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function usersEjemplo()
    {
        // Datos ficticios para los usuarios
        $data = [
            [
                'email' => 'admin@example.com',
                'password' => 'admin123',
                'name' => 'Administrador',
                'role' => 'admin',
            ],
            [
                'email' => 'user@example.com',
                'password' => 'user123',
                'name' => 'Usuario Normal',
                'role' => 'user',
            ],
        ];

        return $data;
    }
}
