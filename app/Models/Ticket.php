<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',
        'prioridad',
        'asignado_a',
        'creador',
    ];

    // Relación con el usuario que lo creó
    public function creator()
    {
        return $this->belongsTo(User::class, 'creador');
    }

    // Relación con el usuario asignado
    public function assignee()
    {
        return $this->belongsTo(User::class, 'asignado_a');
    }

    public static function ticketsEjemplo()
    {
        // Datos ficticios para los tickets
        $data = [
            [
                'titulo' => 'Problema con el login',
                'descripcion' => 'El usuario no puede iniciar sesión con sus credenciales.',
                'estado' => 'abierto',
                'prioridad' => 'alta',
                'asignado_a' => 1, // ID de usuario asignado ficticio
                'creador' => 2, // ID de creador ficticio
            ],
            [
                'titulo' => 'Error en la página de inicio',
                'descripcion' => 'La página de inicio muestra un error 500 en el servidor.',
                'estado' => 'en progreso',
                'prioridad' => 'media',
                'asignado_a' => 3, // ID de usuario asignado ficticio
                'creador' => 1, // ID de creador ficticio
            ],
            [
                'titulo' => 'Funcionalidad de búsqueda rota',
                'descripcion' => 'El sistema de búsqueda no devuelve los resultados esperados.',
                'estado' => 'cerrado',
                'prioridad' => 'baja',
                'asignado_a' => 2, // ID de usuario asignado ficticio
                'creador' => 3, // ID de creador ficticio
            ],
            [
                'titulo' => 'Problema de visualización en móviles',
                'descripcion' => 'El sitio web no se visualiza correctamente en dispositivos móviles.',
                'estado' => 'abierto',
                'prioridad' => 'alta',
                'asignado_a' => 1, // ID de usuario asignado ficticio
                'creador' => 2, // ID de creador ficticio
            ],
            // Agregar más tickets según sea necesario
        ];

        return $data;
    }
}
