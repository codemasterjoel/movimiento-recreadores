<?php

namespace App\Models;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\RegistroLuchador as lsb;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NBC extends Model
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
        'nombre',
        'codigo',
        'jefe_id',
        'organizador_id',
        'formador_id',
        'movilizador_id',
        'defensa_id',
        'productivo_id',
        'cant_consejos_comunales',
        'cant_bases_misiones',
        'cant_urbanismos',
        'cant_cdi',
        'estado_id',
        'municipio_id',
        'parroquia_id',
        'id',
        'latitud',
        'longitud'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }
    public function jefe()
    {
        return $this->belongsTo(lsb::class);
    }
    public function organizador()
    {
        return $this->belongsTo(lsb::class);
    }
    public function formador()
    {
        return $this->belongsTo(lsb::class);
    }
    public function movilizador()
    {
        return $this->belongsTo(lsb::class);
    }
    public function defensa()
    {
        return $this->belongsTo(lsb::class);
    }
    public function productivo()
    {
        return $this->belongsTo(lsb::class);
    }
}
