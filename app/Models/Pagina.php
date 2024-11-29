<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    // Especifica el nombre de la tabla
    protected $table = 'paginas';

    // Define los campos que pueden ser asignados masivamente
    protected $fillable = [
        'imagen',
        'nombre',
        'link',
        'tipo',
        'creador',
    ];

    // Relación con la tabla `users`
    public function creator()
    {
        return $this->belongsTo(User::class, 'creador');
    }

    // Si no deseas que los timestamps se gestionen automáticamente
    public $timestamps = true;

    public static function paginasEjemplo()
    {
        // Datos ficticios para las páginas
        $data = [
            [
                'id' => 1,
                'imagen' => 'imagen1.jpg',
                'nombre' => 'Página de Inicio',
                'link' => '/inicio',
                'tipo' => 'principal',
                'creador' => 1, // ID de creador ficticio
            ],
            [
                'id' => 2,
                'imagen' => 'imagen2.jpg',
                'nombre' => 'Servicios',
                'link' => '/servicios',
                'tipo' => 'informativa',
                'creador' => 2, // ID de creador ficticio
            ],
            [
                'id' => 3,
                'imagen' => 'imagen3.jpg',
                'nombre' => 'Contacto',
                'link' => '/contacto',
                'tipo' => 'informativa',
                'creador' => 1, // ID de creador ficticio
            ],
            [
                'id' => 4,
                'imagen' => 'imagen4.jpg',
                'nombre' => 'Nosotros',
                'link' => '/nosotros',
                'tipo' => 'informativa',
                'creador' => 2, // ID de creador ficticio
            ],
            // Agregar más páginas según sea necesario
        ];

        return $data;
    }
}
