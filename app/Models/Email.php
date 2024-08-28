<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    // Especifica el nombre de la tabla asociada con el modelo
    protected $table = 'emails';

    // Especifica los campos que se pueden asignar de manera masiva
    protected $fillable = ['id', 'nombre', 'email', 'mensaje'];

    // Deshabilita las marcas de tiempo automáticas si no estás usando los campos 'created_at' y 'updated_at'
    public $timestamps = true;

    // Si necesitas personalizar los nombres de las columnas de timestamps
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
