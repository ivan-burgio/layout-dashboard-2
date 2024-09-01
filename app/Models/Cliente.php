<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Definir la tabla asociada al modelo
    protected $table = 'clientes';

    // Definir los campos que pueden ser asignados en masa
    protected $fillable = [
        'id',
        'nombre',
        'email',
        'telefono',
        'numero_cuenta_bancaria',
        'user_id',
        'estado',
        'estado_cambiado_por'
    ];

    // Relación con la tabla `users`
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación con el usuario que cambió el estado
    public function stateChanger()
    {
        return $this->belongsTo(User::class, 'estado_cambiado_por');
    }

    // Si necesitas fechas para `created_at` y `updated_at`
    public $timestamps = true;
}
