<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaisSeeder::class);
        $this->call(NivelSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(ParroquiaSeeder::class);
        $this->call(CentrosSeeder::class);
        $this->call(Centros2Seeder::class);
        $this->call(Centros3Seeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(NivelAcademicoSeeder::class);
        $this->call(ProfesionSeeder::class);
        $this->call(ResponsabilidadSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SaimeSeeder::class);
        $this->call(cneSeeder::class);
        $this->call(FormacionSeeder::class);
    }
}
