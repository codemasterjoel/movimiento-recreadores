<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    public function lsb()
    {
        return $this->hasMany(Luchador::class);
    }
    public function genero()
    {
        return $this->hasMany(Luchador::class);
    }
}
