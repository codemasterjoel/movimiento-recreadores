<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saime extends Model
{
    use HasFactory;

    protected $fillable = [
        'letra',
        'cedula',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'genero_id',
        'fecha_nac'
    ];

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
}
