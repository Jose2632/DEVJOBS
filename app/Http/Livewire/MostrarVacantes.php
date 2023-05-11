<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vacante;

class MostrarVacantes extends Component
{
    /*
    Pruebas con listener desde livewire con mostrar-vacantes con wire:click="$emit('prueba', {{ $vacante->id }})"
    protected $listeners = [
        'prueba'
    ];
    public function prueba($vacante_id) 
    {
        dd($vacante_id);
    }
    */
    protected $listeners = [
        'eliminarVacante'
    ];

    public function eliminarVacante(Vacante $vacante) 
    {
        $vacante->delete();
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}