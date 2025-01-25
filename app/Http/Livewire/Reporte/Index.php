<?php

namespace App\Http\Livewire\Reporte;

use Livewire\Component;

use App\Models\Avanzada;
use App\Models\NivelAcademico;
use App\Models\Responsabilidad;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Genero;


class Index extends Component
{
    public $ContentLuchador, $ContentFormacion, $ContentNBC = false; 
    public $municipios, $estados, $parroquias, $nivelesAcademicos, $responsabilidades, $avanzadas, $generos = null; //campos select
    public $estadoId, $municipioId, $parroquiaId, $nivelAcademicoId, $responsabilidadId, $avanzadaId, $generoId = null; //Id que recibo de los campos

    public function render()
    {
        $this->estados = Estado::all();
        $this->nivelesAcademicos = NivelAcademico::all();
        $this->responsabilidades = Responsabilidad::all();
        $this->avanzadas = Avanzada::all();
        $this->generos = Genero::all();

        return view('livewire.reporte.index');
    }
    public function updatedEstadoId($id)
    {
        $this->municipioId = null;
        $this->parroquiaId = null;
        $this->municipios = Municipio::where('estado_id', $id)->get();
    }
    public function updatedMunicipioId($id)
    {
        $this->parroquiaId = null;
        $this->parroquias = Parroquia::where('municipio_id', $id)->get();
    }
    public function ReporteLuchador()
    {
        if ($this->ContentLuchador) {
            $this->ContentLuchador = false; 
        } else {
            $this->ContentLuchador = true;
            $this->ContentFormacion = false; 
            $this->ContentNBC = false;
        }
    }
    public function ReporteFormacion()
    {
        if ($this->ContentFormacion) {
            $this->ContentFormacion = false; 
        } else {
            $this->ContentFormacion = true;
            $this->ContentLuchador = false; 
            $this->ContentNBC = false;
        }
    }
    public function ReporteNBC()
    {
        if ($this->ContentNBC) {
            $this->ContentNBC = false; 
        } else {
            $this->ContentNBC = true;
            $this->ContentFormacion = false; 
            $this->ContentLuchador = false;
        }
    }
}
