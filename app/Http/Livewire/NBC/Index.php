<?php

namespace App\Http\Livewire\NBC;

use Livewire\Component;

use App\Models\NBC;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;

use Ramsey\Uuid\Uuid;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $modal, $PoseeOrganizador, $PoseeFormador, $PoseeMovilizador, $PoseeDefensa, $PoseeProductivo = false;
    public $ContentOrganizador, $ContentFormador, $ContentMovilizador, $ContentDefensa, $ContentProductivo = false;
    public $FormOrganizador, $FormFormador, $FormMovilizador, $FormDefensa, $FormProductivo = false;
    public $estados     = null; // Lista de estados
    public $municipios  = null; // Liste de Municipios
    public $parroquias  = null; // Lista de parroquias
    public $CedulaJefe, $CedulaOrganizador, $CedulaFormador, $CedulaMovilizador, $CedulaDefensa, $CedulaProductivo = null; //Cedula
    public $NombreNBC, $id = null; // Nombre del NBC
    public $CantConsejoComunal, $CantBaseMisiones, $CantUrbanismo, $CantCDI = null;
    public $NombreJefe, $NombreOrganizador, $NombreFormador, $NombreMovilizador, $NombreDefensa, $NombreProductivo = null; // nombre
    public $IdJefe, $IdOrganizador, $IdFormador, $IdMovilizador, $IdDefensa, $IdProductivo = null; // nombre
    public $search = "";

    public $estadoId, $municipioId, $parroquiaId = null; //Id que recibo de los campos

    public $index = true;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        if ($this->index)
        {
            $nbcs = NBC::where('nombre', 'like', "%$this->search%")
            ->paginate(5);
            $this->estados = Estado::all();
            return view('livewire.n-b-c.index', ['nbcs' => $nbcs]);
        }else
        {
            $this->estados = Estado::all();
            return view('livewire.n-b-c.crear');
        }
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

            $validar_lsb = RegistroLuchador::where('cedula', $this->CedulaJefe)->firstOrFail(); 

            $existelsb = nbc::where('jefe_id', '=', $validar_lsb->id)
                ->orWhere('organizador_id', '=', $validar_lsb->id)
                ->orWhere('formador_id', '=', $validar_lsb->id)
                ->orWhere('movilizador_id', '=', $validar_lsb->id)
                ->orWhere('defensa_id', '=', $validar_lsb->id)
                ->orWhere('productivo_id', '=', $validar_lsb->id)->get();

            if (count($existelsb) > 0)
            {
                session()->flash('yaregistrado', 'yaregistrado');
            }
            else{
                $Luchador = RegistroLuchador::where('cedula', '=', $this->CedulaJefe)->firstOrFail();
                $this->NombreJefe = $Luchador->NombreCompleto;
                $this->IdJefe = $Luchador->id;
            }
        }
        elseif ($estructura == 'organizador') 
        {
            $validar_lsb = RegistroLuchador::where('cedula', $this->CedulaOrganizador)->firstOrFail(); 

            $existelsb = nbc::where('jefe_id', '=', $validar_lsb->id)
                ->orWhere('organizador_id', '=', $validar_lsb->id)
                ->orWhere('formador_id', '=', $validar_lsb->id)
                ->orWhere('movilizador_id', '=', $validar_lsb->id)
                ->orWhere('defensa_id', '=', $validar_lsb->id)
                ->orWhere('productivo_id', '=', $validar_lsb->id)->get();
                
            if (count($existelsb) > 0)
            {
                session()->flash('yaregistrado', 'yaregistrado');
            }
            else{
                $Luchador = RegistroLuchador::where('cedula', '=', $this->CedulaOrganizador)->firstOrFail();
                $this->NombreOrganizador = $Luchador->NombreCompleto;
                $this->IdOrganizador = $Luchador->id;
            }
        }
        elseif ($estructura == 'formador')
        {
            $validar_lsb = RegistroLuchador::where('cedula', $this->CedulaFormador)->firstOrFail(); 

            $existelsb = nbc::where('jefe_id', '=', $validar_lsb->id)
                ->orWhere('organizador_id', '=', $validar_lsb->id)
                ->orWhere('formador_id', '=', $validar_lsb->id)
                ->orWhere('movilizador_id', '=', $validar_lsb->id)
                ->orWhere('defensa_id', '=', $validar_lsb->id)
                ->orWhere('productivo_id', '=', $validar_lsb->id)->get();
                
            if (count($existelsb) > 0)
            {
                session()->flash('yaregistrado', 'yaregistrado');
            }
            else{
                $Luchador = RegistroLuchador::where('cedula', '=', $this->CedulaFormador)->firstOrFail();
                $this->NombreFormador = $Luchador->NombreCompleto;
                $this->IdFormador = $Luchador->id;
            }
        }
        elseif ($estructura == 'movilizador')
        {
            $validar_lsb = RegistroLuchador::where('cedula', $this->CedulaMovilizador)->firstOrFail(); 

            $existelsb = nbc::where('jefe_id', '=', $validar_lsb->id)
                ->orWhere('organizador_id', '=', $validar_lsb->id)
                ->orWhere('formador_id', '=', $validar_lsb->id)
                ->orWhere('movilizador_id', '=', $validar_lsb->id)
                ->orWhere('defensa_id', '=', $validar_lsb->id)
                ->orWhere('productivo_id', '=', $validar_lsb->id)->get();
                
            if (count($existelsb) > 0)
            {
                session()->flash('yaregistrado', 'yaregistrado');
            }
            else{
                $Luchador = RegistroLuchador::where('cedula', '=', $this->CedulaMovilizador)->firstOrFail();
                $this->NombreMovilizador = $Luchador->NombreCompleto;
                $this->IdMovilizador = $Luchador->id;
            } 
        }
        elseif ($estructura == 'defensa')
        {
            $validar_lsb = RegistroLuchador::where('cedula', $this->CedulaDefensa)->firstOrFail(); 

            $existelsb = nbc::where('jefe_id', '=', $validar_lsb->id)
                ->orWhere('organizador_id', '=', $validar_lsb->id)
                ->orWhere('formador_id', '=', $validar_lsb->id)
                ->orWhere('movilizador_id', '=', $validar_lsb->id)
                ->orWhere('defensa_id', '=', $validar_lsb->id)
                ->orWhere('productivo_id', '=', $validar_lsb->id)->get();
                
            if (count($existelsb) > 0)
            {
                session()->flash('yaregistrado', 'yaregistrado');
            }
            else{
                $Luchador = RegistroLuchador::where('cedula', '=', $this->CedulaDefensa)->firstOrFail();
                $this->NombreDefensa = $Luchador->NombreCompleto;  
                $this->IdDefensa = $Luchador->id;
            } 
        }
        elseif ($estructura == 'productor')
        {
            $validar_lsb = RegistroLuchador::where('cedula', $this->CedulaProductivo)->firstOrFail(); 

            $existelsb = nbc::where('jefe_id', '=', $validar_lsb->id)
                ->orWhere('organizador_id', '=', $validar_lsb->id)
                ->orWhere('formador_id', '=', $validar_lsb->id)
                ->orWhere('movilizador_id', '=', $validar_lsb->id)
                ->orWhere('defensa_id', '=', $validar_lsb->id)
                ->orWhere('productivo_id', '=', $validar_lsb->id)->get();
                
            if (count($existelsb) > 0)
            {
                session()->flash('yaregistrado', 'yaregistrado');
            }
            else{
                $Luchador = RegistroLuchador::where('cedula', '=', $this->CedulaProductivo)->firstOrFail();
                $this->NombreProductivo = $Luchador->NombreCompleto;   
                $this->IdProductivo = $Luchador->id;
            }
        }
    }
    public function editar($id)
    {
        $nbc = NBC::findOrFail($id);

        $this->id = $id;
        $this->NombreNBC = $nbc->nombre;
        $this->CedulaJefe = $nbc->jefe->cedula;
        $this->CedulaOrganizador = (isset($nbc->organizador)) ? $nbc->organizador->cedula : "" ;
        $this->CedulaFormador = (isset($nbc->formador)) ? $nbc->formador->cedula : "" ;
        $this->CedulaMovilizador = (isset($nbc->movilizador)) ? $nbc->movilizador->cedula : "" ;
        $this->CedulaDefensa = (isset($nbc->defensa)) ? $nbc->defensa->cedula : "" ;
        $this->CedulaProductivo = (isset($nbc->productivo)) ? $nbc->productivo->cedula : "" ;

        $this->IdJefe = $nbc->jefe_id;
        $this->IdOrganizador = (isset($nbc->organizador)) ? $nbc->organizador_id : null ;
        $this->IdFormador = (isset($nbc->formador)) ? $nbc->formador_id : null ;
        $this->IdMovilizador = (isset($nbc->movilizador)) ? $nbc->movilizador_id : null ;
        $this->IdDefensa = (isset($nbc->defensa)) ? $nbc->defensa_id : null ;
        $this->IdProductivo = (isset($nbc->productivo)) ? $nbc->productivo_id : null ;

        $this->PoseeOrganizador = (isset($nbc->organizador)) ? true : false ;
        $this->PoseeFormador = (isset($nbc->formador)) ? true : false ;
        $this->PoseeMovilizador = (isset($nbc->movilizador)) ? true : false ;
        $this->PoseeDefensa = (isset($nbc->defensa)) ? true : false ;
        $this->PoseeProductivo = (isset($nbc->productivo)) ? true : false ;

        $this->NombreJefe = $nbc->jefe->cedula;
        dd($this->NombreJefe);
        $this->NombreOrganizador = (isset($nbc->organizador)) ? $nbc->organizador->NombreCompleto : "" ;
        $this->NombreFormador = (isset($nbc->formador)) ? $nbc->formador->NombreCompleto : "" ;
        $this->NombreMovilizador = (isset($nbc->movilizador)) ? $nbc->movilizador->NombreCompleto : "" ;
        $this->NombreDefensa = (isset($nbc->defensa)) ? $nbc->defensa->NombreCompleto : "" ;
        $this->NombreProductivo = (isset($nbc->productivo)) ? $nbc->productivo->NombreCompleto : "" ;

        $this->estadoId = $nbc->estado_id;
        $this->municipioId = $nbc->municipio_id;
        $this->municipios = Municipio::where('estado_id', $nbc->estado_id)->get();
        $this->parroquiaId = $nbc->parroquia_id;
        $this->parroquias = Parroquia::where('municipio_id', $nbc->municipio_id)->get();

        $this->CantConsejoComunal = $nbc->cant_consejos_comunales;
        $this->CantBaseMisiones = $nbc->cant_bases_misiones;
        $this->CantUrbanismo = $nbc->cant_urbanismos;
        $this->CantCDI = $nbc->cant_cdi;

        return redirect('/nbc/editar', ['nbcs' => $nbc]);
    }
    public function guardar()
    {
        $lsb = NBC::updateOrCreate(['id' => $this->id],
            [
            'nombre' => $this->NombreNBC,
            'codigo' => $this->parroquiaId.random_int('1000', '9999'),
            'jefe_id' => $this->IdJefe,
            'organizador_id' => $this->IdOrganizador,
            'formador_id' => $this->IdFormador,
            'movilizador_id' => $this->IdMovilizador,
            'defensa_id' => $this->IdDefensa,
            'productivo_id' => $this->IdProductivo,
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
            $this->ContentMovilizador = false;
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
            $this->ContentMovilizador = false;
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
        if ($this->ContentMovilizador) {
            $this->ContentMovilizador = false; 
        } else {
            $this->ContentMovilizador = true;
            $this->ContentOrganizador = false; 
            $this->ContentFormador = false;
            $this->ContentDefensa = false;
            $this->ContentProductivo = false;
        }
    }
    public function updatedPoseeMovilizador()
    {
        if ($this->FormMovilizador) {
            $this->FormMovilizador = false;
            $this->CedulaMovilizador = null;
            $this->NombreMovilizador = null;
        } else {
            $this->FormMovilizador = true;
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
            $this->ContentMovilizador = false;
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
            $this->ContentMovilizador = false;
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
        $this->CedulaMovilizador = null;
        $this->NombreMovilizador = null;
        $this->CedulaDefensa = null;
        $this->NombreDefensa = null;
        $this->CedulaProductivo = null;
        $this->NombreProductivo = null;
        $this->PoseeOrganizador = false;
        $this->PoseeFormador = false;
        $this->PoseeMovilizador = false;
        $this->PoseeDefensa = false;
        $this->PoseeProductivo = false;
        $this->ContentOrganizador = false;
        $this->ContentFormador = false;
        $this->ContentMovilizador = false;
        $this->ContentDefensa = false;
        $this->ContentProductivo = false; 
        $this->IdJefe = null;
        $this->IdOrganizador = null;
        $this->IdFormador = null;
        $this->IdMovilizador = null;
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