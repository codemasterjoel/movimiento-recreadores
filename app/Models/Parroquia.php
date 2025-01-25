<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function lsb()
    {
        return $this->hasMany(Luchador::class);
    }
    public function nbc()
    {
        return $this->hasMany(NBC::class);
    }
}
