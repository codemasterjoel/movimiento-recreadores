<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cne extends Model
{
    use HasFactory;

    public function integrante()
    {
        return $this->belongsTo(integrate::class);
    }
}
