<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Responsabilidad;

class ResponsabilidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Responsabilidad::insert([
            ['nombre' => 'DIRECTOR (a) NACIONAL', 'nivel' => '1'],
            ['nombre' => 'ORGANIZACIÓN Y PARTICIPACIÓN', 'nivel' => '1'],
            ['nombre' => 'FORMACIÓN LIBERADORA', 'nivel' => '1'],
            ['nombre' => 'COMUNICACIÓN E INNOVACIÓN', 'nivel' => '1'],
            ['nombre' => 'CONTROL Y SEGUIMIENTO', 'nivel' => '1'],
            ['nombre' => 'SECRETARIO GENERAL DEL ESTADO MAYOR', 'nivel' => '1'],
            ['nombre' => 'COORDINADOR (a) ESTADAL', 'nivel' => '2'],
            ['nombre' => 'ORGANIZACIÓN Y PARTICIPACION ESTADAL', 'nivel' => '2'],
            ['nombre' => 'FORMACIÓN LIBERADORA ESTADAL', 'nivel' => '2'],
            ['nombre' => 'COMUNICACIÓN E INNOVACIÓN ESTADAL', 'nivel' => '2'],
            ['nombre' => 'CONTROL Y SEGUIMIENTO ESTADAL', 'nivel' => '2'],
            ['nombre' => 'COORDINADOR (a) MUNICIPAL', 'nivel' => '3'],
            ['nombre' => 'ORGANIZACIÓN Y PARTICIPACION MUNICIPAL', 'nivel' => '3'],
            ['nombre' => 'FORMACIÓN LIBERADORA MUNICIPAL', 'nivel' => '3'],
            ['nombre' => 'COMUNICACIÓN E INNOVACIÓN MUNICIPAL', 'nivel' => '3'],
            ['nombre' => 'CONTROL Y SEGUIMIENTO MUNICIPAL', 'nivel' => '3'],
            ['nombre' => 'COORDINADOR (a) PARROQUIAL', 'nivel' => '4'],
            ['nombre' => 'ORGANIZACIÓN Y PARTICIPACION PARROQUIAL', 'nivel' => '4'],
            ['nombre' => 'FORMACIÓN LIBERADORA PARROQUIAL', 'nivel' => '4'],
            ['nombre' => 'COMUNICACIÓN E INNOVACIÓN PARROQUIAL', 'nivel' => '4'],
            ['nombre' => 'CONTROL Y SEGUIMIENTO PARROQUIAL', 'nivel' => '4'],
        ]);
    }
}
