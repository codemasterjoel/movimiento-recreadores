<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;


class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estado::insert([
            ['id' => '22', 'nombre' => 'AMAZONAS', 'estado_id' => '22'],
            ['id' => '2', 'nombre' => 'ANZOÁTEGUI', 'estado_id' => '2'],
            ['id' => '3', 'nombre' => 'APURE', 'estado_id' => '3'],
            ['id' => '4', 'nombre' => 'ARAGUA', 'estado_id' => '4'],
            ['id' => '5', 'nombre' => 'BARINAS', 'estado_id' => '5'],
            ['id' => '6', 'nombre' => 'BOLÍVAR', 'estado_id' => '6'],
            ['id' => '7', 'nombre' => 'CARABOBO', 'estado_id' => '7'],
            ['id' => '8', 'nombre' => 'COJEDES', 'estado_id' => '8'],
            ['id' => '23', 'nombre' => 'DELTA AMACURO', 'estado_id' => '23'],
            ['id' => '1', 'nombre' => 'DISTRITO CAPITAL', 'estado_id' => '1'],
            ['id' => '9', 'nombre' => 'FALCÓN', 'estado_id' => '9'],
            ['id' => '10', 'nombre' => 'GUÁRICO', 'estado_id' => '10'],
            ['id' => '24', 'nombre' => 'LA GUAIRA', 'estado_id' => '24'],
            ['id' => '11', 'nombre' => 'LARA', 'estado_id' => '11'],
            ['id' => '12', 'nombre' => 'MÉRIDA', 'estado_id' => '12'],
            ['id' => '13', 'nombre' => 'MIRANDA', 'estado_id' => '13'],
            ['id' => '14', 'nombre' => 'MONAGAS', 'estado_id' => '14'],
            ['id' => '15', 'nombre' => 'NUEVA ESPARTA', 'estado_id' => '15'],
            ['id' => '16', 'nombre' => 'PORTUGUESA', 'estado_id' => '16'],
            ['id' => '17', 'nombre' => 'SUCRE', 'estado_id' => '17'],
            ['id' => '18', 'nombre' => 'TÁCHIRA', 'estado_id' => '18'],
            ['id' => '19', 'nombre' => 'TRUJILLO', 'estado_id' => '19'],
            ['id' => '20', 'nombre' => 'YARACUY', 'estado_id' => '20'],
            ['id' => '21', 'nombre' => 'ZULIA', 'estado_id' => '21'],
            ['id' => '25', 'nombre' => 'NACIONAL', 'estado_id' => '25']
        ]);
    }
}
