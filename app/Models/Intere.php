<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intere extends Model
{
    use HasFactory;

    protected $fillable = ['id,porcetaje'];

    public function prestamos(): BelongsTo
    {
        return $this->belongsTo(Prestamo::class,'id');
    }
}
