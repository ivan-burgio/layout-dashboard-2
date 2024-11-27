<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Si el nombre de la tabla en la base de datos no sigue la convención plural del modelo, especifícalo aquí
    protected $table = 'events';

    // Campos que se pueden asignar en masa (mass assignment)
    protected $fillable = ['title', 'start', 'end', 'color'];

    // Campos que deberían ser tratados como fechas (si usas 'created_at' y 'updated_at' también puedes definirlo aquí)
    protected $dates = [
        'start',
        'end',
    ];

    // Si no estás usando los timestamps 'created_at' y 'updated_at', añade esta línea
    public $timestamps = false;

    public static function eventsEjemplo()
    {
        $data = [
            [
                'title' => 'Reunión con clientes',
                'start' => '2024-12-01 10:00:00',
                'end' => '2024-12-01 12:00:00',
                'color' => '#FF5733', // Rojo anaranjado
            ],
            [
                'title' => 'Lanzamiento de producto',
                'start' => '2024-12-05 14:00:00',
                'end' => '2024-12-05 16:00:00',
                'color' => '#33FF57', // Verde brillante
            ],
            [
                'title' => 'Evento de networking',
                'start' => '2024-12-10 09:00:00',
                'end' => '2024-12-10 11:00:00',
                'color' => '#3357FF', // Azul brillante
            ],
            [
                'title' => 'Revisión de proyectos',
                'start' => '2024-12-15 15:00:00',
                'end' => '2024-12-15 17:00:00',
                'color' => '#FFD700', // Amarillo dorado
            ],
            // Agrega más eventos según sea necesario
        ];

        return $data;
    }
}
