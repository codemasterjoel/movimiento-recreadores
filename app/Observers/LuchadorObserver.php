<?php

namespace App\Observers;

use App\Models\RegistroLuchador;
use App\Models\Auditoria;

class LuchadorObserver
{
    public function created(RegistroLuchador $registroLuchador): void
    {
        Auditoria::create([
            'accion' => 'Creado',
            'model_type' => get_class($registroLuchador),
            'model_id' => $registroLuchador->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($registroLuchador->toArray())
        ]);
    }
    public function updated(RegistroLuchador $registroLuchador): void
    {
        $actualizacion = $registroLuchador->getOriginal();
        $cambios = [];
        
        foreach ($actualizacion as $key => $value) 
        {
            if ($registroLuchador->$key !== $value)
            {
                $cambios[$key] = ['anterior' => $value, 'nuevo' => $registroLuchador->$key];
            }
        }

        Auditoria::create([
            'accion' => 'Actualizado',
            'model_type' => get_class($registroLuchador),
            'model_id' => $registroLuchador->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($cambios)
        ]);
    }
    public function deleted(RegistroLuchador $registroLuchador): void
    {
        Auditoria::create([
            'accion' => 'Eliminado',
            'model_type' => get_class($registroLuchador),
            'model_id' => $registroLuchador->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($registroLuchador->toArray())
        ]);
    }
    public function restored(RegistroLuchador $registroLuchador): void
    {
        //
    }
    public function forceDeleted(RegistroLuchador $registroLuchador): void
    {
        //
    }
}
