<?php

namespace App\Http\Livewire\Infoqr;
use App\Models\Infoqr;
use App\Models\RegistroLuchador as Luchador;

use Livewire\Component;

class Index extends Component
{
    public $lsb = null;

    public function mount($id) {
        $this->lsb = Luchador::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.reporte.info')->layout('layouts.single');
    }
}
