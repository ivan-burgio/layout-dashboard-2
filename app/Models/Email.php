<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $table = 'emails';

    protected $fillable = [
        'id',
        'nombre',
        'email',
        'estado',
        'mensaje',
        'creador',
        'estado',
        'estado_cambiado_por',
    ];

    public $timestamps = true;

    // Relación con el usuario que creó el registro
    public function creator()
    {
        return $this->belongsTo(User::class, 'creador');
    }

    // Relación con el usuario que cambió el estado
    public function stateChanger()
    {
        return $this->belongsTo(User::class, 'estado_cambiado_por');
    }
}
