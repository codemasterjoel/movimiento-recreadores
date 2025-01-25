<?php

namespace App\Models;

use App\Models\NBC;
use App\Models\Municipio;
use App\Models\User;
use App\Models\RegistroLuchador as lsb;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    public function municipio()
    {
        return $this->hasMany(Municipio::class);
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
        return $this->hasMany(lsb::class);
    }
}
