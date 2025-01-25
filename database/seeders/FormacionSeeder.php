<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Formacion;

class FormacionSeeder extends Seeder
{
    public function run(): void
    {
        Formacion::insert([[
            'id' => 'a3f2946a-68cc-40d3-a138-ba22aae09995',
            'letra' => 'V',
            'pais_id' => 'VE',
            'estatus' => true,
            'cedula' => '18192664',
            'NombreCompleto' => 'JOSE LEONARDO PEREZ SANCHEZ',
            'fecha_nac' => '1988/12/17',
            'telefono' => '(0424) 345-5678',
            'correo' => 'joseperez@gmail.com',
            'genero_id' => '1',
            'nivel_academico_id' => '2',
            'estado_id' => '1',
            'municipio_id'  => '101',
            'parroquia_id'  => '10122',
            'direccion' => 'CALLE PRINCIPAL'
        ]]);
    }
}
