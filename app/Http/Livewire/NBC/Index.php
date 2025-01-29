<?php

namespace App\Http\Livewire\NBC;

use Livewire\Component;

use App\Models\NBC;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Nivel;
use App\Models\RegistroLuchador;

use Ramsey\Uuid\Uuid;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $modal, $PoseeJefe, $PoseeOrganizador, $PoseeFormador, $PoseeComunicador = false;
    public $ContentDefensa, $ContentOrganizador, $ContentFormador, $ContentComunicador  = false;
    public $FormJefe, $FormOrganizador, $FormFormador, $FormComunicador = false;
    public $estados, $niveles, $municipios, $parroquias  = null; 
    public $CedulaJefe, $CedulaOrganizador, $CedulaFormador, $CedulaComunicador = null; //Cedula
    public $NombreNRC, $id = null; // Nombre del NBC
    public $circuitos_comunales, $bases_misiones, $casa_alimentacion, $consejos_comunales, $urbanismos, $parques_nacionales, $parques_recreacion, $rios, $playas, $balnearios, $plazas, $canchas = null;
    public $NombreJefe, $NombreOrganizador, $NombreFormador, $NombreComunicador = null; // nombre
    public $IdJefe, $IdOrganizador, $IdFormador, $IdComunicador = null; // nombre
    public $search = "";
    public $estadoId, $municipioId, $parroquiaId = null; //Id que recibo de los campos
    public $index = true;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $this->niveles = Nivel::all();
        $nrcs = NBC::where('nombre', 'like', "%$this->search%")
        ->paginate(5);
        $this->estados = Estado::all();
        return view('livewire.n-b-c.index', ['nrcs' => $nrcs]);
    }
    public function crear()
    {
        // $this->limpiarCampos();
        $this->abrirModal();
    }
    public function abrirModal() 
    {
        $this->modal = true;
        $this->index = false;
    }
    public function organizador() 
    {
        $this->ModalOrganizador = true;
    }
    public function cerrarModal()
    {
        $this->index = true;
        $this->modal = false;
        $this->limpiarCampos();
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
    public function consultar($estructura)
    {
        if ($estructura == 'jefe') 
        {

            $validar_recredor = RegistroLuchador::where('cedula', $this->CedulaJefe)->firstOrFail(); 

            $existerecreador = nbc::where('jefe_id', '=', $validar_lsb->id)
                ->orWhere('organizador_id', '=', $validar_lsb->id)
                ->orWhere('formador_id', '=', $validar_lsb->id)
                ->orWhere('comunicador_id', '=', $validar_lsb->id)->get();

            if (count($existerecreador) > 0)
            {
                session()->flash('yaregistrado', 'yaregistrado');
            }
            else{
                $recreador = RegistroLuchador::where('cedula', '=', $this->CedulaJefe)->firstOrFail();
                $this->NombreJefe = $recreador->NombreCompleto;
                $this->IdJefe = $recreador->id;
            }
        }
        elseif ($estructura == 'organizador') 
        {
            $validar_recreador = RegistroLuchador::where('cedula', $this->CedulaOrganizador)->firstOrFail(); 

            $existerecreador = nbc::where('jefe_id', '=', $validar_recreador->id)
                ->orWhere('organizador_id', '=', $validar_recreador->id)
                ->orWhere('formador_id', '=', $validar_recreador->id)
                ->orWhere('comunicador_id', '=', $validar_recreador->id)->get();
                
            if (count($existerecreador) > 0)
            {
                session()->flash('yaregistrado', 'yaregistrado');
            }
            else{
                $recreador = RegistroLuchador::where('cedula', '=', $this->CedulaOrganizador)->firstOrFail();
                $this->NombreOrganizador = $recreador->NombreCompleto;
                $this->IdOrganizador = $recreador->id;
            }
        }
        elseif ($estructura == 'formador')
        {
            $validar_recreador = RegistroLuchador::where('cedula', $this->CedulaFormador)->firstOrFail(); 

            $existerecreador = nbc::where('jefe_id', '=', $validar_recreador->id)
                ->orWhere('organizador_id', '=', $validar_recreador->id)
                ->orWhere('formador_id', '=', $validar_recreador->id)
                ->orWhere('comunicador_id', '=', $validar_recreador->id)->get();
                
            if (count($existerecreador) > 0)
            {
                session()->flash('yaregistrado', 'yaregistrado');
            }
            else{
                $recreador = RegistroLuchador::where('cedula', '=', $this->CedulaFormador)->firstOrFail();
                $this->NombreFormador = $recreador->NombreCompleto;
                $this->IdFormador = $recreador->id;
            }
        }
        elseif ($estructura == 'comunicador')
        {
            $validar_recreador = RegistroLuchador::where('cedula', $this->CedulaComunicador)->firstOrFail(); 
            $existerecreador = nbc::where('jefe_id', '=', $validar_recreador->id)
                ->orWhere('organizador_id', '=', $validar_recreador->id)
                ->orWhere('formador_id', '=', $validar_recreador->id)
                ->orWhere('comunicador_id', '=', $validar_recreador->id)->get();
            if (count($existerecreador) > 0)
            {
                session()->flash('yaregistrado', 'yaregistrado');
            }
            else
            {
                $recreador = RegistroLuchador::where('cedula', '=', $this->CedulaComunicador)->firstOrFail();
                $this->NombreComunicador = $recreador->NombreCompleto;
                $this->IdComunicador = $recreador->id;
            } 
        }
    }
    public function editar($id)
    {
        $nrc = NBC::findOrFail($id);

        $this->id = $id;
        $this->NombreNRC = $nrc->nombre;
        $this->CedulaJefe = $nrc->jefe->cedula;
        $this->CedulaOrganizador = (isset($nrc->organizador)) ? $nrc->organizador->cedula : "" ;
        $this->CedulaFormador = (isset($nrc->formador)) ? $nrc->formador->cedula : "" ;
        $this->CedulaComunicador = (isset($nrc->comunicador)) ? $nrc->comunicador->cedula : "" ;

        $this->IdJefe = $nrc->jefe_id;
        $this->IdOrganizador = (isset($nrc->organizador)) ? $nrc->organizador_id : null ;
        $this->IdFormador = (isset($nrc->formador)) ? $nrc->formador_id : null ;
        $this->IdComunicador = (isset($nrc->comunicador)) ? $nrc->comuncador_id : null ;

        $this->PoseeOrganizador = (isset($nrc->organizador)) ? true : false ;
        $this->PoseeFormador = (isset($nrc->formador)) ? true : false ;
        $this->PoseeComunicador = (isset($nrc->comunicador)) ? true : false ;

        $this->NombreJefe = $nrc->jefe->cedula;
        $this->NombreOrganizador = (isset($nrc->organizador)) ? $nrc->organizador->NombreCompleto : "" ;
        $this->NombreFormador = (isset($nrc->formador)) ? $nrc->formador->NombreCompleto : "" ;
        $this->NombreComunicador = (isset($nrc->comunicador)) ? $nrc->comunicador->NombreCompleto : "" ;

        $this->estadoId = $nrc->estado_id;
        $this->municipioId = $nrc->municipio_id;
        $this->municipios = Municipio::where('estado_id', $nrc->estado_id)->get();
        $this->parroquiaId = $nrc->parroquia_id;
        $this->parroquias = Parroquia::where('municipio_id', $nrc->municipio_id)->get();

        $this->circuitos_comunales = $nrc->circuitos_comunales;
        $this->bases_misiones = $nrc->bases_misiones;
        $this->casa_alimentacion = $nrc->casa_alimentacion;
        $this->consejos_comunales = $nrc->consejos_comunales;
        $this->urbanismos = $nrc->urbanismos;
        $this->parques_nacionales = $nrc->parques_nacionales;
        $this->parques_recreacion = $nrc->parques_recreacion;
        $this->rios = $nrc->rios;
        $this->playas = $nrc->playas;
        $this->balnearios = $nrc->balnearios;
        $this->plazas = $nrc->plazas;
        $this->canchas = $nrc->canchas;
        
        return redirect('/nrc/editar')->with('nrcs', $nrc);
    }
    public function guardar()
    {
        $nrc = NBC::updateOrCreate(['id' => $this->id],
            [
            'nombre' => $this->NombreNRC,
            'codigo' => $this->parroquiaId.random_int('1000', '9999'),
            'jefe_id' => $this->IdJefe,
            'organizador_id' => $this->IdOrganizador,
            'formador_id' => $this->IdFormador,
            'comunicador_id' => $this->IdComunicador,
            'cant_consejos_comunales' => $this->CantConsejoComunal,
            'cant_bases_misiones' => $this->CantBaseMisiones,
            'cant_urbanismos' => $this->CantUrbanismo,
            'cant_cdi' => $this->CantCDI,
            'estado_id' => $this->estadoId,
            'municipio_id' => $this->municipioId,
            'parroquia_id' => $this->parroquiaId
        ]);
         
         session()->flash('message', 'success');
         
         $this->cerrarModal(); 
    }
    public function borrar($id)
    {
        NBC::find($id)->delete();
        session()->flash('message', 'delete');
    }
    public function MenuOrganizador()
    {
        if ($this->ContentOrganizador) {
            $this->ContentOrganizador = false; 
        } else {
            $this->ContentOrganizador = true; 
            $this->ContentFormador = false;
            $this->Contentcomunicador = false;
            $this->ContentDefensa = false;
            $this->ContentProductivo = false;
        }
    }
    public function updatedPoseeOrganizador()
    {
        if ($this->FormOrganizador) {
            $this->FormOrganizador = false;
            $this->CedulaOrganizador = null;
            $this->NombreOrganizador = null;
            $this->FechaNacOrganizador = null;
            $this->TelefonoOrganizador = null;
            $this->GeneroOrganizador = null;
            $this->CorreoOrganizador = null;
        } else {
            $this->FormOrganizador = true;
        }
    }
    public function MenuFormador()
    {
        if ($this->ContentFormador) {
            $this->ContentFormador = false; 
        } else {
            $this->ContentFormador = true;
            $this->ContentOrganizador = false; 
            $this->Contentcomunicador = false;
            $this->ContentDefensa = false;
            $this->ContentProductivo = false;
        }
    }
    public function updatedPoseeFormador()
    {
        if ($this->FormFormador) {
            $this->FormFormador = false;
            $this->CedulaFormador = null;
            $this->NombreFormador = null;
        } else {
            $this->FormFormador = true;
        }
    }
    public function MenuMovilizacion()
    {
        if ($this->Contentcomunicador) {
            $this->Contentcomunicador = false; 
        } else {
            $this->Contentcomunicador = true;
            $this->ContentOrganizador = false; 
            $this->ContentFormador = false;
            $this->ContentDefensa = false;
            $this->ContentProductivo = false;
        }
    }
    public function updatedPoseecomunicador()
    {
        if ($this->Formcomunicador) {
            $this->Formcomunicador = false;
            $this->Cedulacomunicador = null;
            $this->Nombrecomunicador = null;
        } else {
            $this->Formcomunicador = true;
        }
    }
    public function MenuDefensa()
    {
        if ($this->ContentDefensa) {
            $this->ContentDefensa = false; 
        } else {
            $this->ContentDefensa = true; 
            $this->ContentOrganizador = false; 
            $this->ContentFormador = false;
            $this->Contentcomunicador = false;
            $this->ContentProductivo = false;
        }
    }
    public function updatedPoseeDefensa()
    {
        if ($this->FormDefensa) {
            $this->FormDefensa = false;
            $this->CedulaDefensa = null;
            $this->NombreDefensa = null;
        } else {
            $this->FormDefensa = true;
        }
    }
    public function MenuProductivo()
    {
        if ($this->ContentProductivo) {
            $this->ContentProductivo = false; 
        } else {
            $this->ContentProductivo = true; 
            $this->ContentOrganizador = false; 
            $this->ContentFormador = false;
            $this->Contentcomunicador = false;
            $this->ContentDefensa = false;
        }
    }
    public function updatedPoseeProductivo()
    {
        if ($this->FormProductivo) {
            $this->FormProductivo = false;
            $this->CedulaProductivo = null;
            $this->NombreProductivo = null;
        } else {
            $this->FormProductivo = true;
        }
    }
    public function limpiarCampos()
    {
        $this->NombreNBC = null;
        $this->CedulaJefe = null;
        $this->NombreJefe = null;
        $this->CedulaOrganizador = null;
        $this->NombreOrganizador = null;
        $this->CedulaFormador = null;
        $this->NombreFormador = null;
        $this->Cedulacomunicador = null;
        $this->Nombrecomunicador = null;
        $this->CedulaDefensa = null;
        $this->NombreDefensa = null;
        $this->CedulaProductivo = null;
        $this->NombreProductivo = null;
        $this->PoseeOrganizador = false;
        $this->PoseeFormador = false;
        $this->Poseecomunicador = false;
        $this->PoseeDefensa = false;
        $this->PoseeProductivo = false;
        $this->ContentOrganizador = false;
        $this->ContentFormador = false;
        $this->Contentcomunicador = false;
        $this->ContentDefensa = false;
        $this->ContentProductivo = false; 
        $this->IdJefe = null;
        $this->IdOrganizador = null;
        $this->IdFormador = null;
        $this->Idcomunicador = null;
        $this->IdDefensa = null;
        $this->IdProductivo = null;
        $this->CantConsejoComunal = null;
        $this->CantBaseMisiones = null;
        $this->CantUrbanismo = null;
        $this->CantCDI = null;
        $this->estadoId = null;
        $this->municipioId = null;
        $this->parroquiaId = null;
    }
}