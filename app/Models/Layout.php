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
        'tipo',
        'creador',
        'link',
        'imagen',
    ];

    // Deshabilitamos timestamps automáticos si no necesitamos created_at y updated_at
    public $timestamps = true;

    /**
     * Relación con el modelo User.
     * Un layout pertenece a un creador (usuario).
     */
    public function creador()
    {
        return $this->belongsTo(User::class, 'creador');
    }
}
