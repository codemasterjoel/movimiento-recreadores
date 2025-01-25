<?php

namespace App\Http\Livewire\Sessions;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Sessions;

use DB;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        // $sessions = DB::table('sessions')
        //      ->orderBy('last_activity', 'DESC')
        //      ->get();
        $sessions = Sessions::where('user_id', '>', 0)->get();
         return view('livewire.sessions.index', ['sessions' => $sessions]);
    }
    public function cerrar($id)
    {
        DB::table('sessions')
             ->where('id', $id)
             ->delete();
    }
}
