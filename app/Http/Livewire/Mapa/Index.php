<?php

namespace App\Http\Livewire\Mapa;

use Livewire\Component;
use App\Models\NBC;


class Index extends Component
{
    public $initialMarkers;
    public function render()
    {
        $this->initialMarkers = [
            [
                'position' => [
                    'lat' => 10.5109229,
                    'lng' => -66.9123303
                ],
                'draggable' => true
            ],
            [
                'position' => [
                    'lat' => 10.5080043,
                    'lng' => -66.8992691
                ],
                'draggable' => false
            ],
            [
                'position' => [
                    'lat' => 10.497788714576616,
                    'lng' => -66.9116850756751
                ],
                'draggable' => true
            ]
        ];

        $nbcs = NBC::where('latitud', "<>", "")->get();
        return view('livewire.mapa.index', ['nbcs' => $nbcs]);
    }
}
