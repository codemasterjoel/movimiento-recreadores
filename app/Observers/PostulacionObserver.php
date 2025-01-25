<?php

namespace App\Observers;
use App\Models\Auditoria;

use App\Models\postulacion;

class PostulacionObserver
{
    public function created(postulacion $postulacion): void
    {
    }
    public function updated(postulacion $postulacion): void
    {
        $actualizacion = $postulacion->getOriginal();
        $cambios = [];
        
        foreach ($actualizacion as $key => $value) 
        {
            if ($postulacion->$key !== $value)
            {
                $cambios[$key] = ['anterior' => $value, 'nuevo' => $postulacion->$key];
            }
        }

        Auditoria::create([
            'accion' => 'Actualizado',
            'model_type' => get_class($postulacion),
            'model_id' => $postulacion->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($cambios)
        ]);
    }
    public function deleted(postulacion $postulacion): void
    {
        Auditoria::create([
            'accion' => 'Eliminado',
            'model_type' => get_class($postulacion),
            'model_id' => $postulacion->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($postulacion->toArray())
        ]);
    }
    public function restored(postulacion $postulacion): void
    {
        //
    }
    public function forceDeleted(postulacion $postulacion): void
    {
        //
    }
}
