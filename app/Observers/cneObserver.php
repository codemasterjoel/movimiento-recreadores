<?php

namespace App\Observers;

use App\Models\cne;
use App\Models\Auditoria;

class cneObserver
{
    public function created(cne $cne): void
    {
        Auditoria::create([
            'accion' => 'Creado',
            'model_type' => get_class($cne),
            'model_id' => $cne->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($cne->toArray())
        ]);
    }
    public function updated(cne $cne): void
    {
        $actualizacion = $cne->getOriginal();
        $cambios = [];
        
        foreach ($actualizacion as $key => $value) 
        {
            if ($cne->$key !== $value)
            {
                $cambios[$key] = ['anterior' => $value, 'nuevo' => $cne->$key];
            }
        }

        Auditoria::create([
            'accion' => 'Actualizado',
            'model_type' => get_class($cne),
            'model_id' => $cne->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($cambios)
        ]);
    }
    public function deleted(cne $cne): void
    {
        Auditoria::create([
            'accion' => 'Eliminado',
            'model_type' => get_class($cne),
            'model_id' => $cne->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($cne->toArray())
        ]);
    }
    public function restored(cne $cne): void
    {
        //
    }
    public function forceDeleted(cne $cne): void
    {
        //
    }
}
