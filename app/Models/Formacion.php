<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Formacion extends Model
{
    use HasFactory, SoftDeletes;
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    protected $fillable = [
        'estatus',
        'cedula',
        'NombreCompleto',
        'fecha_nac',
        'telefono',
        'correo',
        'genero_id',
        'nivel_academico_id',
        'estado_id',
        'municipio_id',
        'parroquia_id',
        'direccion'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }
    public function nivelAcademico()
    {
        return $this->belongsTo(NivelAcademico::class);
    }
}
