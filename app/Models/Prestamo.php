<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = ['id,nombre'];

    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class,'id');
    }

    public function modopagos(): HasMany
    {
        return $this->hasMany(frecuenciaPago::class,'id');
    }

    public function interes(): HasMany
    {
        return $this->hasMany(Intere::class,'id');
    }

    public function cuotas(): BelongsTo
    {
        return $this->belongsTo(cuotas::class,'id');
    }
}
