<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    public function parroquia()
    {
        return $this->hasMany(Parroquia::class);
    }
    public function nbc()
    {
        return $this->hasMany(NBC::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function lsb()
    {
        return $this->hasMany(Luchador::class);
    }
}
