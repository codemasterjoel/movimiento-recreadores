<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\RegistroLuchador;

class RegistroLuchadorSeeder extends Seeder
{
    public function run(): void
    {
        RegistroLuchador::insert([[
            'id' => 'a3f2946a-68cc-40d3-a138-ba22aae09990',
            'letra' => 'V',
            'edad'  => '34',
            'estatus' => true,
            'cedula' => '19491796',
            'nombre' => 'JOEL ANTONIO',
            'apellido' => 'ZERPA GUERRERO',
            'fecha_nac' => '1990/10/17',
            'telefono' => '(0416) 620-7494',
            'correo' => 'codemaster19@gmail.com',
            'genero_id' => '1',
            'nivel_academico_id' => '5',
            'responsabilidad_id' => '2',
            'estado_id' => '1',
            'municipio_id'  => '101',
            'parroquia_id'  => '10122',
            'direccion' => 'CALLE 10'
        ]]);
    }
}
