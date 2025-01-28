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
            ['nombre' => 'ESTADO MAYOR NACIONAL', 'nivel' => '1'],
        ]);
    }
}
