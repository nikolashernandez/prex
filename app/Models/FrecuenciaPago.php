<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrecuenciaPago extends Model
{
    use HasFactory;

    public function prestamos(): BelongsTo
    {
        return $this->belongsTo(Prestamo::class,'id');
    }

}
