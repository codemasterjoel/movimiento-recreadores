<?php

namespace App\Http\Livewire\Auditoria;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Auditoria;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $auditorias = Auditoria::query()->paginate(5);
        return view('livewire.auditoria.index', ['auditorias' => $auditorias]);
    }
}
