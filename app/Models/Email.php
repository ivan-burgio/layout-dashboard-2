<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $table = 'emails';

    protected $fillable = [
        'id',
        'nombre',
        'email',
        'estado',
        'mensaje',
        'creador',
        'estado',
        'estado_cambiado_por',
    ];

    public $timestamps = true;

    // Relación con el usuario que creó el registro
    public function creator()
    {
        return $this->belongsTo(User::class, 'creador');
    }

    // Relación con el usuario que cambió el estado
    public function stateChanger()
    {
        return $this->belongsTo(User::class, 'estado_cambiado_por');
    }

    public static function emailsEjemplo()
    {
        $data = [
            [
                'id' => 1,
                'nombre' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'estado' => 'En Proceso',
                'mensaje' => 'Este es un mensaje de prueba para Juan.',
                'creador' => 1, // ID de creador ficticio
                'estado_cambiado_por' => null,
                'created_at' => '2024-11-01 10:00:00', // Fecha de creación
            ],
            [
                'id' => 2,
                'nombre' => 'Ana López',
                'email' => 'ana.lopez@example.com',
                'estado' => 'Pendiente',
                'mensaje' => 'Este es un mensaje pendiente para Ana.',
                'creador' => 2, // Otro ID de creador ficticio
                'estado_cambiado_por' => 1, // Estado cambiado por el usuario con ID 1
                'created_at' => '2024-11-02 14:30:00', // Fecha de creación
            ],
            [
                'id' => 3,
                'nombre' => 'Carlos Gómez',
                'email' => 'carlos.gomez@example.com',
                'estado' => 'Completado',
                'mensaje' => 'Este es un mensaje de prueba para Carlos.',
                'creador' => 3, // ID de creador ficticio
                'estado_cambiado_por' => null,
                'created_at' => '2024-11-03 09:00:00', // Fecha de creación
            ],
            // Agrega más correos según sea necesario
        ];

        return $data;
    }
}
