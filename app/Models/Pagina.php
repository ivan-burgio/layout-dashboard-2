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
        'user_id',
    ];

    // Relación con la tabla `users`
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Si no deseas que los timestamps se gestionen automáticamente
    public $timestamps = true;
}
