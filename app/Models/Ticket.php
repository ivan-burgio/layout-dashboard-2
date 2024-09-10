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
        'creado_por',
    ];

    // Relación con el usuario que lo creó
    public function creator()
    {
        return $this->belongsTo(User::class, 'creado_por');
    }

    // Relación con el usuario asignado
    public function assignee()
    {
        return $this->belongsTo(User::class, 'asignado_a');
    }
}
