<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\registro1x10ffm;
use App\Models\Integrante;
use App\Models\NBC;
use App\Models\postulacion;
use App\Models\Formacion;
use App\Models\RegistroLuchador;

use DB;

class Dashboard extends Component
{
    public $jefe, $integrante, $postulados, $formacions = null;
    public $nbc = null;
    public $jefexestado, $integrantexestado, $luchadores, $generos, $NivelAcademico, $responsabilidades = null;

    public function render()
    {
        $this->jefe = registro1x10ffm::all()->count();
        // $this->jefe = DB::select('SELECT count(*) as total from registro1x10ffms');
        // $this->integrante = DB::select('select count(*) from integrantes');
        // dd($this->jefe);
        $this->nbc = NBC::all();
        $this->postulados = postulacion::all();
        $this->formacions = Formacion::all();
        $this->luchadores = RegistroLuchador::where('estado_id', '<>', '25')->get();

        // $this->jefexestado = DB::select('SELECT COUNT(*) as jefes, estados.nombre from registro1x10ffms INNER JOIN estados on registro1x10ffms.estado_id = estados.id GROUP BY estados.nombre');
        $this->generos = DB::select('SELECT COUNT(*) as total, genero from registro1x10ffms GROUP BY genero ORDER BY genero DESC');
        $this->NivelAcademico = DB::select('SELECT count(*) as total, nivel_academicos.nombre from registro_luchadors INNER JOIN nivel_academicos on registro_luchadors.nivel_academico_id = nivel_academicos.id GROUP BY nivel_academicos.nombre ORDER BY total DESC');
        $this->responsabilidades = DB::select('SELECT count(*) as total, responsabilidads.nombre from registro_luchadors INNER JOIN responsabilidads on registro_luchadors.responsabilidad_id = responsabilidads.id GROUP BY responsabilidads.nombre ORDER BY total DESC');
        // dd($this->generos);
        $this->jefexestado = DB::select('SELECT COUNT(*) as jefes, estados.nombre from registro_luchadors INNER JOIN estados on registro_luchadors.estado_id = estados.id GROUP BY estados.nombre ORDER BY estados.nombre DESC');
        $this->integrantexestado = DB::select('select estados.nombre, count(*) as integrantes from integrantes inner join registro1x10ffms on integrantes.jefe_id = registro1x10ffms.id INNER join estados on registro1x10ffms.estado_id = estados.id GROUP BY estados.nombre');
        return view('livewire.dashboard');
    }
}
