<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['id,nombre,apellido,direccion,telefono,redes_sociales,nombre_trabajo,direccion_trabajo,foto,correo_electronico'];

    use HasFactory;

    public function prestamo(): BelongsTo
    {
        return $this->belongsTo(Prestamo::class,'id');
    }
}
