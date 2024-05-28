<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    public function prestamo(): HasMany
    {
        return $this->hasMany(Prestamo::class,'id');
    }

}
