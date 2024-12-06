<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $table = 'email_messages';
    protected $fillable = [
        'id',
        'nombre',
        'email',
        'estado',
        'mensaje',
        'estado_cambiado_por'
    ];

    // Define la relación con el modelo User para el campo 'estado_cambiado_por'
    public function stateChanger()
    {
        return $this->belongsTo(User::class, 'estado_cambiado_por');
    }

    public static function mensajesEjemplo()
    {
        // Datos ficticios para los mensajes
        $data = [
            [
                'id' => 1, // ID único para el mensaje
                'nombre' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'estado' => 'Completado',
                'mensaje' => 'Hola, me gustaría obtener más información sobre sus servicios.',
                'estado_cambiado_por' => 1, // ID de usuario que cambió el estado ficticio
                'created_at' => '2024-11-01 10:00:00', // Fecha de creación
            ],
            [
                'id' => 2, // ID único para el mensaje
                'nombre' => 'Ana López',
                'email' => 'ana.lopez@example.com',
                'estado' => 'Pendiente',
                'mensaje' => 'Tengo algunas dudas sobre los precios de los productos.',
                'estado_cambiado_por' => 2, // ID de usuario que cambió el estado ficticio
                'created_at' => '2024-11-02 14:30:00', // Fecha de creación
            ],
            [
                'id' => 3, // ID único para el mensaje
                'nombre' => 'Carlos Gómez',
                'email' => 'carlos.gomez@example.com',
                'estado' => 'En Proceso',
                'mensaje' => 'Gracias por la atención, mi problema ha sido solucionado.',
                'estado_cambiado_por' => 1, // ID de usuario que cambió el estado ficticio
                'created_at' => '2024-11-03 09:00:00', // Fecha de creación
            ],
            // Agregar más mensajes según sea necesario
        ];

        return $data;
    }
}
