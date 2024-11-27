<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Definir la tabla asociada al modelo
    protected $table = 'clientes';

    // Definir los campos que pueden ser asignados en masa
    protected $fillable = [
        'id',
        'nombre',
        'email',
        'telefono',
        'numero_cuenta_bancaria',
        'creador',
        'estado',
        'estado_cambiado_por'
    ];

    // Relación con la tabla `users`
    public function creator()
    {
        return $this->belongsTo(User::class, 'creador');
    }

    // Relación con el usuario que cambió el estado
    public function stateChanger()
    {
        return $this->belongsTo(User::class, 'estado_cambiado_por');
    }

    // Si necesitas fechas para `created_at` y `updated_at`
    public $timestamps = true;

    public static function clientesEjemplo()
    {
        $data = [
            [
                'id' => 1,
                'nombre' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'telefono' => '555123456',
                'numero_cuenta_bancaria' => '1234567890',
                'creador' => 1, // ID de creador ficticio
                'estado' => 'activo',
                'estado_cambiado_por' => null,
            ],
            [
                'id' => 2,
                'nombre' => 'Ana López',
                'email' => 'ana.lopez@example.com',
                'telefono' => '555987654',
                'numero_cuenta_bancaria' => '9876543210',
                'creador' => 2, // Otro ID de creador ficticio
                'estado' => 'inactivo',
                'estado_cambiado_por' => 1, // Estado cambiado por el usuario con ID 1
            ],
            [
                'id' => 3,
                'nombre' => 'Carlos Gómez',
                'email' => 'carlos.gomez@example.com',
                'telefono' => '555456789',
                'numero_cuenta_bancaria' => '1122334455',
                'creador' => 2, // ID de creador ficticio
                'estado' => 'activo',
                'estado_cambiado_por' => null,
            ],
            // Agrega más clientes según sea necesario
        ];

        return $data;
    }
}
