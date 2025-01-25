<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'area_id',
        'nivel_id',
        'estado_id',
        'municipio_id',
        'parroquia_id',
    ];

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    public function area()
    {
        return $this->belongsTo(area::class);
    }
}
