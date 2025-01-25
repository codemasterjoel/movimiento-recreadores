<?php

namespace App\Http\Livewire\Registro1x10ffm;

use Livewire\Component;

use App\Models\registro1x10ffm;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Genero;
use App\Models\Saime;
use App\Models\cne;
use App\Models\centro;
use App\Models\Integrante;

use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $modal, $estado, $mostrar, $integranteModal = false;
    public $nombreCompleto, $jefeNombreCompleto = null; //Nombres
    public $municipios  = null; // Liste de Municipios
    public $estados     = null; // Lista de estados
    public $parroquias  = null; // Lista de parroquias
    public $generos = null; //Genero
    public $cedula = null; //Cedula
    public $centros = null;
    public $id, $idIntegrante, $saime_id, $jefe_id = null;
    public $telefono = null; //Telefono
    public $existelsb2 = null; //
    public $integrantes = null; //
    public $search = "";
    // public $saime= null;
    public $estadoId, $municipioId, $parroquiaId, $generoId, $centroId = null; //Id que recibo de los campos
    public $nombreCompletoIntegrante, $cedulaIntegrante, $telefonoIntegrante = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        if (auth()->user()->estado_id <> 25) {
            $registro1x10 = registro1x10ffm::where('estado_id', '=', auth()->User()->estado_id)
            ->where('cedula', 'like', "%$this->search%")
            ->paginate(5);
        }else {
            $registro1x10 = registro1x10ffm::where('cedula', 'like', "%$this->search%")
            ->paginate(5);
        }
        $this->estados = Estado::where('id', '<', '25')->get();
        $this->generos = Genero::all();
        // $this->centros = centro::all();
        return view('livewire.registro1x10ffm.index', ['registro1x10'=>$registro1x10]);
    }
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }
    public function abrirModal() 
    {
        $this->modal = true;
    }
    public function cerrarModal() 
    {
        $this->modal = false;
        $this->integranteModal = false;
    }
    public function cerrarFormulario()
    {
        $this->mostrar = false;
    }
    public function limpiarCampos()
    {
        $this->cedula = null;
        $this->nombreCompleto = null;
        $this->telefono = null;
        $this->correo = null;
        $this->generoId = null;
        $centrolsb = null;
        $this->centroId = null;
        $parroquialsb = null;
        $this->parroquiaId = null;
        $this->parroquias = null;
        $municipiolsb = null;
        $this->centros = null;
        $this->municipioId = null;
        $this->municipios = null;
        $this->estadoId = null;
        $this->mostrar = false;
        $this->cedulaIntegrante = null;
        $this->nombreCompletoIntegrante = null;
        $this->telefonoIntegrante = null;
    }
    public function limpiarCampos2()
    {
        $this->nombreCompleto = null;
        $this->telefono = null;
        $this->correo = null;
        $this->generoId = null;
        $centrolsb = null;
        $this->centroId = null;
        $parroquialsb = null;
        $this->parroquiaId = null;
        $this->parroquias = null;
        $municipiolsb = null;
        $this->centros = null;
        $this->municipioId = null;
        $this->municipios = null;
        $this->estadoId = null;

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
    public function updatedParroquiaId($id)
    {
        $this->centroId = null;
        $this->centros = centro::where('parroquia_id', $id)->get();
    }
    public function consultar()
    {
        // $this->limpiarCampos2();
        // $elector = null;

        $existelsb = registro1x10ffm::where('cedula', '=', $this->cedula)->get();
        
        if (count($existelsb) > 0) //se encuentra registrado como jefe
        {
            session()->flash('yaregistrado', 'yaregistrado');
            $this->cerrarFormulario();
            // $this->existelsb2 = $existelsb;
        } else 
        {
            $elector = cne::where('cedula', '=', $this->cedula)->get();
            if (count($elector)>0) 
            {
                $elector = cne::where('cedula', '=', $this->cedula)->firstOrFail();
                $this->nombreCompleto = $elector->nombre;
                if ($elector->genero == 'M') {
                    $this->generoId = 1;
                } else {
                    $this->generoId = 2;
                }
    
                $centrolsb = centro::where('id', $elector->centro_id)->firstOrFail();
                $this->centroId = $centrolsb->id;
                $this->centros = centro::where('parroquia_id', $centrolsb->parroquia_id)->get();
    
                $parroquialsb = Parroquia::where('id', $centrolsb->parroquia_id)->firstOrFail();
                $this->parroquiaId = $parroquialsb->id;
                $this->parroquias = Parroquia::where('municipio_id', $parroquialsb->municipio_id)->get();
    
                $municipiolsb = Municipio::where('id', $parroquialsb->municipio_id)->firstOrFail();
                $this->municipioId = $municipiolsb->id;
                $this->municipios = Municipio::where('estado_id', $municipiolsb->estado_id)->get();
                $this->estadoId = $municipiolsb->estado_id;
    
                $this->mostrar = true;
            }else
            {
                session()->flash('noencontrada', 'noencontrada');
                $this->mostrar = true;
                // $this->existelsb2 = $elector;
            }
        }
    }
    public function guardar()
    {
        $this->validate([
            'cedula' =>'required',
            'nombreCompleto' =>'required',
            'telefono' =>'required',
            'estadoId' =>'required',
            'municipioId' =>'required',
            'parroquiaId' =>'required',
            'centroId' =>'required',
            'generoId' =>'required',
        ]);
        $jefe1x10 = registro1x10ffm::updateOrCreate(['id' => $this->id],
            [
                'cedula' => $this->cedula,
                'genero' => $this->generoId,
                'NombreCompleto' => $this->nombreCompleto,
                'telefono' => $this->telefono,
                'estado_id' => $this->estadoId,
                'municipio_id' => $this->municipioId,
                'parroquia_id' => $this->parroquiaId,
                'centro_id' => $this->centroId
        ]);
         
         session()->flash('success', 'success');
         
         $this->cerrarModal();
         $this->limpiarCampos();
         $this->mostrar = false;
    }
    public function abrirIntegrante()
    {
        $this->limpiarCampos();
        $this->integranteModal = true;
    }
    public function integrante($id)
    {
        // $this->limpiarIntegrante();
        $this->integrantes = Integrante::where('jefe_id', $id)->get();
        $this->jefe_id = $id;
        $jefe_1x10 = registro1x10ffm::where('id', $id)->firstOrFail();
        $this->jefeNombreCompleto = $jefe_1x10->NombreCompleto;
        $this->abrirIntegrante();
    }
    public function consultar1()
    {
        $existelsb = registro1x10ffm::where('cedula', '=', $this->cedula)->get();
        
        if (count($existelsb) > 0) //se encuentra registrado como jefe
        {
            session()->flash('yaregistrado', 'yaregistrado');
            $this->cerrarFormulario();
            // $this->existelsb2 = $existelsb;
        } else 
        {
            $elector = cne::where('cedula', '=', $this->cedula)->get();
            if (count($elector)>0)
            {
                $elector = cne::where('cedula', '=', $this->cedula)->firstOrFail();
                $this->nombreCompleto = trim($elector->nombre1)." ".trim($elector->nombre2)." ".trim($elector->apellido1)." ".trim($elector->apellido2);
                if ($elector->genero == 'M') {
                    $this->generoId = 1;
                } else {
                    $this->generoId = 2;
                }
    
                $centrolsb = centro::where('id', $elector->centro_id)->firstOrFail();
                $this->centroId = $centrolsb->id;
                $this->centros = centro::where('parroquia_id', $centrolsb->parroquia_id)->get();
    
                $parroquialsb = Parroquia::where('id', $centrolsb->parroquia_id)->firstOrFail();
                $this->parroquiaId = $parroquialsb->id;
                $this->parroquias = Parroquia::where('municipio_id', $parroquialsb->municipio_id)->get();
    
                $municipiolsb = Municipio::where('id', $parroquialsb->municipio_id)->firstOrFail();
                $this->municipioId = $municipiolsb->id;
                $this->municipios = Municipio::where('estado_id', $municipiolsb->estado_id)->get();
                $this->estadoId = $municipiolsb->estado_id;
    
                $this->mostrar = true;
            }else
            {
                session()->flash('noencontrada', 'noencontrada');
                $this->mostrar = true;
                // $this->existelsb2 = $elector;
            }
        }
        
    }
    public function consultarIntegrante()
    {

        $existeIntegrante = Integrante::where('cedula', '=', $this->cedulaIntegrante)->get();

        if (count($existeIntegrante) > 0)
        {
            session()->flash('yaregistrado', 'success');
            $this->cedulaIntegrante = null;
        }
        else 
        {
            $existecne = cne::where('cedula', '=', $this->cedulaIntegrante)->get();
            if (count($existecne) > 0) {
                $cne = cne::where('cedula', '=', $this->cedulaIntegrante)->firstOrFail();
                $this->nombreCompletoIntegrante = $cne->nombre;
            } else {
                session()->flash('noencontrada', 'noencontrada');
            }
        }
    }
    public function guardarIntegrante()
    {

        $this->validate([
            'cedulaIntegrante' =>'required',
            'nombreCompletoIntegrante' =>'required',
            'telefonoIntegrante' =>'required'
        ]);

        $integrante = integrante::updateOrCreate(['id' => $this->idIntegrante],
            [
                // 'saime_id' => $this->saime_id,
                'cedula' => $this->cedulaIntegrante,
                'nombreCompleto' => $this->nombreCompletoIntegrante,
                'jefe_id' => $this->jefe_id,
                // 'fecha_nac' => $this->fechaNacimiento,
                'telefono' => $this->telefonoIntegrante,
                // 'estado_id' => $this->estadoId,
                // 'municipio_id' => $this->municipioId,
                // 'parroquia_id' => $this->parroquiaId,
                // 'centro_id' => $this->centroId
        ]);
         
         session()->flash('integranteGuardado', 'success');
         //  $this->cerrarModal();
         $this->limpiarCampos();
         $this->resetPage($this->integrante($this->jefe_id));
        //  $this->mostrar = false;
    }
    public function editarIntegrante($id)
    {
        $integrante = Integrante::find($id);
        $saime = Saime::where('id', $integrante->saime_id)->firstOrFail();
        $this->idIntegrante = $integrante->id;
        $this->saime_id = $integrante->saime_id;
        $this->jefe_id = $integrante->jefe_id;
        $this->telefonoIntegrante = $integrante->telefono;

        $this->cedulaIntegrante = $saime->cedula;
        $this->nombreCompletoIntegrante = $saime->nombre1." ".$saime->nombre2." ".$saime->apellido1." ".$saime->apellido2;
    }
    public function borrarIntegrante($id)
    {
        Integrante::find($id)->delete();
        session()->flash('integranteEliminado', 'success');
        $this->resetPage($this->integrante($this->jefe_id));
    }
}
