<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',
        'prioridad',
        'asignado_a',
        'creador',
    ];

    // Relación con el usuario que lo creó
    public function creator()
    {
        return $this->belongsTo(User::class, 'creador');
    }

    // Relación con el usuario asignado
    public function assignee()
    {
        return $this->belongsTo(User::class, 'asignado_a');
    }
}
