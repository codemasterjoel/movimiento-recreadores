<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avanzada extends Model
{
    use HasFactory;

    public function lsb()
    {
        return $this->hasMany(Luchador::class);
    }
}
