<?php

namespace App\Observers;

use App\Models\Auditoria;
use App\Models\Integrante;

class IntegranteObserver
{
    public function created(Integrante $integrante): void
    {
        Auditoria::create([
            'accion' => 'Creado',
            'model_type' => get_class($integrante),
            'model_id' => $integrante->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($integrante->toArray())
        ]);
    }
    public function updated(Integrante $integrante): void
    {
        $actualizacion = $integrante->getOriginal();
        $cambios = [];
        
        foreach ($actualizacion as $key => $value) 
        {
            if ($integrante->$key !== $value)
            {
                $cambios[$key] = ['anterior' => $value, 'nuevo' => $integrante->$key];
            }
        }

        Auditoria::create([
            'accion' => 'Actualizado',
            'model_type' => get_class($integrante),
            'model_id' => $integrante->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($cambios)
        ]);
    }
    public function deleted(Integrante $integrante): void
    {
        Auditoria::create([
            'accion' => 'Eliminado',
            'model_type' => get_class($integrante),
            'model_id' => $integrante->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($integrante->toArray())
        ]);
    }
    public function restored(Integrante $integrante): void
    {
        //
    }
    public function forceDeleted(Integrante $integrante): void
    {
        //
    }
}
