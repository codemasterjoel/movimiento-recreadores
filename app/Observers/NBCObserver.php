<?php

namespace App\Observers;

use App\Models\Auditoria;
use App\Models\NBC;

class NBCObserver
{
    public function created(NBC $nbc): void
    {
        Auditoria::create([
            'accion' => 'Creado',
            'model_type' => get_class($nbc),
            'model_id' => $nbc->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($nbc->toArray())
        ]);
    }
    public function updated(NBC $nbc): void
    {
        $actualizacion = $nbc->getOriginal();
        $cambios = [];
        
        foreach ($actualizacion as $key => $value) 
        {
            if ($nbc->$key !== $value)
            {
                $cambios[$key] = ['anterior' => $value, 'nuevo' => $nbc->$key];
            }
        }

        Auditoria::create([
            'accion' => 'Actualizado',
            'model_type' => get_class($nbc),
            'model_id' => $nbc->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($cambios)
        ]);
    }
    public function deleted(NBC $nbc): void
    {
        Auditoria::create([
            'accion' => 'Eliminado',
            'model_type' => get_class($nbc),
            'model_id' => $nbc->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($nbc->toArray())
        ]);
    }
    public function restored(NBC $nbc): void
    {
        //
    }
    public function forceDeleted(NBC $nbc): void
    {
        //
    }
}
