<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    use HasFactory;

    protected $fillable = [
        'saime_id',
        'telefono',
        'jefe_id',
        'cedula',
        'nombreCompleto'
    ];

    public function jefe()
    {
        return $this->belongsTo(registro1x10ffm::class);
    }
    public function saime()
    {
        return $this->belongsTo(Saime::class);
    }
}
