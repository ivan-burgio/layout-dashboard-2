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
    ];

    public $timestamps = true;  // Para que Laravel maneje automáticamente los campos created_at y updated_at
}
