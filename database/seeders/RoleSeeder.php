<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\rols;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        rols::insert(['id' => 1, 'nombre' =>  'Administrador', 'created_at' => '2022-06-04 23:31:08', 'updated_at' => '2022-06-04 23:31:08'],
                    ['id' => 2,  'nombre' =>  'Estandar', 'created_at' => '2022-06-04 23:31:08', 'updated_at' => '2022-06-04 23:31:08']);

    }
}
