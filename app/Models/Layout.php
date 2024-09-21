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
}
