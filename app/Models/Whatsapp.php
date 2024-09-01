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
        'user_id',
        'estado_cambiado_por'
    ];

    public $timestamps = true;  // Para que Laravel maneje automáticamente los campos created_at y updated_at

    // Define la relación con el modelo User para el campo 'user_id'
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define la relación con el modelo User para el campo 'estado_cambiado_por'
    public function stateChanger()
    {
        return $this->belongsTo(User::class, 'estado_cambiado_por');
    }
}
