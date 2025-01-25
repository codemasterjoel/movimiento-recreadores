<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Auditoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'accion',
        'model_type',
        'model_id',
        'user_id',
        'cambios'
    ];

    protected $cast = [
        'cambios' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}