<?php

namespace App\Http\Livewire\Saime;

use Livewire\Component;

use App\Models\Saime;
use App\Models\Genero;

use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = "";
    public $modal = false;
    public $generos = null; //Genero
    public $id, $letra, $generoId, $cedula, $nombre1, $nombre2, $apellido1, $apellido2, $fechaNacimiento = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $saimes = Saime::where('cedula', 'like', "%$this->search%")
        ->paginate(5);
        $this->generos = Genero::all();

        return view('livewire.saime.index', ['saimes'=>$saimes]);
    }
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }
    public function limpiarCampos()
    {
        $this->letra = null;
        $this->generoId = null;
        $this->cedula = null;
        $this->nombre1 = null;
        $this->nombre2 = null;
        $this->apellido1 = null;
        $this->apellido2 = null;
        $this->fechaNacimiento = null;
    }
    public function editar($id)
    {
        $saime = Saime::findOrFail($id);

        $this->id = $id;
        $this->letra = $saime->letra;
        $this->generoId = $saime->genero_id;
        $this->cedula = $saime->cedula;
        $this->nombre1 = $saime->nombre1;
        $this->nombre2 = $saime->nombre2;
        $this->apellido1 = $saime->apellido1;
        $this->apellido2 = $saime->apellido2;
        $this->fechaNacimiento = $saime->fecha_nac;

        $this->modal = true;
        
    }
    public function guardar()
    {
        $saime = Saime::updateOrCreate(['id' => $this->id],
        [
            'letra' => $this->letra,
            'cedula' => $this->cedula,
            'nombre1' => $this->nombre1,
            'nombre2' => $this->nombre2,
            'apellido1' => $this->apellido2,
            'apellido2' => $this->apellido2,
            'fecha_nac' => $this->fechaNacimiento,
            'genero_id' => $this->generoId
        ]);
     
        session()->flash('success', 'success');
        
        $this->cerrarModal();
        $this->limpiarCampos();
    }
    public function abrirModal() 
    {
        $this->modal = true;
    }
    public function cerrarModal() 
    {
        $this->modal = false;
    }
    public function borrar($id)
    {
        Saime::find($id)->delete();
        session()->flash('integranteEliminado', 'success');
    }    
}