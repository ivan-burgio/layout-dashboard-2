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

    // Otras configuraciones y métodos pueden ser añadidos aquí según tus necesidades
}
