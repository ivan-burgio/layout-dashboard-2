<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    // Nombre de la tabla
    protected $table = 'layouts';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria',
        'creador',
        'link',
        'imagen',
    ];

    // Relación con la tabla `users`
    public function creator()
    {
        return $this->belongsTo(User::class, 'creador');
    }

    // Deshabilitamos timestamps automáticos si no necesitamos created_at y updated_at
    public $timestamps = false;

    public static function layoutsEjemplo()
    {
        // Datos ficticios para los layouts
        $data = [
            [
                'nombre' => 'Layout Corporativo',
                'descripcion' => 'Un diseño profesional para empresas.',
                'categoria' => 'Dashboard',
                'creador' => 1, // ID del usuario creador (asumiendo que ya existe un usuario con ID 1)
                'link' => 'https://www.example.com/corporativo',
                'imagen' => 'layouts/corporativo.jpg',
            ],
            [
                'nombre' => 'Layout E-commerce',
                'descripcion' => 'Diseño optimizado para tiendas en línea.',
                'categoria' => 'Web',
                'creador' => 1,
                'link' => 'https://www.example.com/ecommerce',
                'imagen' => 'layouts/ecommerce.jpg',
            ],
            [
                'nombre' => 'Layout Portfolio',
                'descripcion' => 'Plantilla ideal para mostrar proyectos de diseño.',
                'categoria' => 'Web',
                'creador' => 1,
                'link' => 'https://www.example.com/portfolio',
                'imagen' => 'layouts/portfolio.jpg',
            ],
            [
                'nombre' => 'Layout Blog Personal',
                'descripcion' => 'Diseño minimalista para blogs personales.',
                'categoria' => 'Web',
                'creador' => 1,
                'link' => 'https://www.example.com/blog',
                'imagen' => 'layouts/blog.jpg',
            ],
            [
                'nombre' => 'Layout Landing Page',
                'descripcion' => 'Ideal para crear páginas de aterrizaje para campañas.',
                'categoria' => 'Web',
                'creador' => 1,
                'link' => 'https://www.example.com/landing',
                'imagen' => 'layouts/landing.jpg',
            ],
            // Agregar más layouts según sea necesario
        ];

        return $data;
    }
}
