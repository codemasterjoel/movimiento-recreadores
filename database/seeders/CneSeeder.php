<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\cne;

class CneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        cne::insert([
            ['id' => '1', 'letra' => 'V', 'cedula' => '19491796', 'nombre' => 'JOEL ANTONIO ZERPA GUERRERO', 'genero' => 'M', 'centro_id' => '220101007', 'estado_id' => '22']
        ]);
    }
}
