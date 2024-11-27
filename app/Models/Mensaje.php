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
                'nombre' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'estado' => 'enviado',
                'mensaje' => 'Hola, me gustaría obtener más información sobre sus servicios.',
                'estado_cambiado_por' => 1, // ID de usuario que cambió el estado ficticio
            ],
            [
                'nombre' => 'Ana López',
                'email' => 'ana.lopez@example.com',
                'estado' => 'pendiente',
                'mensaje' => 'Tengo algunas dudas sobre los precios de los productos.',
                'estado_cambiado_por' => 2, // ID de usuario que cambió el estado ficticio
            ],
            [
                'nombre' => 'Carlos Gómez',
                'email' => 'carlos.gomez@example.com',
                'estado' => 'resuelto',
                'mensaje' => 'Gracias por la atención, mi problema ha sido solucionado.',
                'estado_cambiado_por' => 1, // ID de usuario que cambió el estado ficticio
            ],
            // Agregar más mensajes según sea necesario
        ];

        return $data;
    }
}
