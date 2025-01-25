<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\area;

class AreaSeeder extends Seeder
{

    public function run(): void
    {
        area::insert([
            ['nombre' => 'Formaciòn'],
            ['nombre' => 'Puesto de Comando'],
            ['nombre' => 'Social'],
            ['nombre' => 'Cultura'],
            ['nombre' => 'Comunicaciòn'],
            ['nombre' => 'Defensa'],
            ['nombre' => 'Economìa'],
            ['nombre' => 'Productivo'],
            ['nombre' => 'Tribilin'],
            ['nombre' => 'Propaganda'],
            ['nombre' => 'Organizaciòn'],
            ['nombre' => 'Ejecutiva']
        ]);
    }
}
