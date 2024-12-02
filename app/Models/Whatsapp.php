<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whatsapp extends Model
{
    use HasFactory;

    protected $table = 'whatsapps';

    protected $fillable = [
        'id',
        'nombre',
        'telefono',
        'estado',
        'mensaje',
        'fecha',
        'creador',
        'estado_cambiado_por'
    ];

    public $timestamps = true;  // Para que Laravel maneje automáticamente los campos created_at y updated_at

    // Define la relación con el modelo User para el campo 'creador'
    public function creator()
    {
        return $this->belongsTo(User::class, 'creador');
    }

    // Define la relación con el modelo User para el campo 'estado_cambiado_por'
    public function stateChanger()
    {
        return $this->belongsTo(User::class, 'estado_cambiado_por');
    }

    public static function whatsappsEjemplo()
    {
        // Datos ficticios para los registros de WhatsApp
        $data = [
            [
                'id' => 1, // ID único para el registro
                'nombre' => 'Juan Pérez',
                'telefono' => '123456789',
                'estado' => 'Completado',
                'mensaje' => '¿Puedo saber más sobre sus servicios?',
                'fecha' => now(),
                'creador' => 1, // ID de usuario creador ficticio
                'estado_cambiado_por' => 1, // ID de usuario que cambió el estado
                'created_at' => '2024-11-01 10:00:00', // Fecha de creación
            ],
            [
                'id' => 2, // ID único para el registro
                'nombre' => 'Ana López',
                'telefono' => '987654321',
                'estado' => 'Pendiente',
                'mensaje' => 'Tengo dudas sobre los productos.',
                'fecha' => now(),
                'creador' => 2, // ID de usuario creador ficticio
                'estado_cambiado_por' => 2, // ID de usuario que cambió el estado
                'created_at' => '2024-11-02 14:30:00', // Fecha de creación
            ],
            [
                'id' => 3, // ID único para el registro
                'nombre' => 'Carlos Gómez',
                'telefono' => '111223344',
                'estado' => 'En Proceso',
                'mensaje' => 'Gracias, todo solucionado.',
                'fecha' => now(),
                'creador' => 1, // ID de usuario creador ficticio
                'estado_cambiado_por' => 1, // ID de usuario que cambió el estado
                'created_at' => '2024-11-03 09:00:00', // Fecha de creación
            ],
            // Puedes agregar más registros según sea necesario
        ];

        return $data;
    }
}
