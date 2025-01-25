<?php

namespace App\Observers;

use App\Models\Saime;
use App\Models\Auditoria;

class SaimeObserver
{
    public function created(Saime $saime): void
    {
        Auditoria::create([
            'accion' => 'Creado',
            'model_type' => get_class($saime),
            'model_id' => $saime->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($saime->toArray())
        ]);
    }
    public function updated(Saime $saime): void
    {
        $actualizacion = $saime->getOriginal();
        $cambios = [];
        
        foreach ($actualizacion as $key => $value) 
        {
            if ($saime->$key !== $value)
            {
                $cambios[$key] = ['anterior' => $value, 'nuevo' => $saime->$key];
            }
        }

        Auditoria::create([
            'accion' => 'Actualizado',
            'model_type' => get_class($saime),
            'model_id' => $saime->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($cambios)
        ]);
    }
    public function deleted(Saime $saime): void
    {
        Auditoria::create([
            'accion' => 'Eliminado',
            'model_type' => get_class($saime),
            'model_id' => $saime->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($saime->toArray())
        ]);
    }
    public function restored(Saime $saime): void
    {
        //
    }
    public function forceDeleted(Saime $saime): void
    {
        //
    }
}
