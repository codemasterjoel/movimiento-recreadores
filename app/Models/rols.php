<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rols extends Model
{
    public function user()
    {
        return $this->hasMany(user::class);
    }
}
