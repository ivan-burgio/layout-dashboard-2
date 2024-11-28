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
        // Datos ficticios para los tickets con el campo 'id' agregado
        $data = [
            [
                'id' => 1, // ID del ticket
                'titulo' => 'Problema con el login',
                'descripcion' => 'El usuario no puede iniciar sesión con sus credenciales.',
                'estado' => 'Abierto',
                'prioridad' => 'alta',
                'asignado_a' => 1, // ID de usuario asignado ficticio
                'creador' => 2, // ID de creador ficticio
                'created_at' => now(), // Fecha de creación
            ],
            [
                'id' => 2, // ID del ticket
                'titulo' => 'Error en la página de inicio',
                'descripcion' => 'La página de inicio muestra un error 500 en el servidor.',
                'estado' => 'Pendiente',
                'prioridad' => 'media',
                'asignado_a' => 3, // ID de usuario asignado ficticio
                'creador' => 1, // ID de creador ficticio
                'created_at' => now(), // Fecha de creación
            ],
            [
                'id' => 3, // ID del ticket
                'titulo' => 'Funcionalidad de búsqueda rota',
                'descripcion' => 'El sistema de búsqueda no devuelve los resultados esperados.',
                'estado' => 'Cerrado',
                'prioridad' => 'baja',
                'asignado_a' => 2, // ID de usuario asignado ficticio
                'creador' => 3, // ID de creador ficticio
                'created_at' => now(), // Fecha de creación
            ],
            [
                'id' => 4, // ID del ticket
                'titulo' => 'Problema de visualización en móviles',
                'descripcion' => 'El sitio web no se visualiza correctamente en dispositivos móviles.',
                'estado' => 'Abierto',
                'prioridad' => 'alta',
                'asignado_a' => 1, // ID de usuario asignado ficticio
                'creador' => 2, // ID de creador ficticio
                'created_at' => now(), // Fecha de creación
            ],
            // Agregar más tickets según sea necesario
        ];

        return $data;
    }
}
