<?php

namespace App\Observers;

use App\Models\Registro1x10ffm;
use App\Models\Auditoria;

class Registro1x10ffmsObserver
{
    public function created(Registro1x10ffm $registro1x10ffm): void
    {
        Auditoria::create([
            'accion' => 'Creado',
            'model_type' => get_class($registro1x10ffm),
            'model_id' => $registro1x10ffm->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($registro1x10ffm->toArray())
        ]);
    }
    public function updated(Registro1x10ffm $registro1x10ffm): void
    {
        $actualizacion = $registro1x10ffm->getOriginal();
        $cambios = [];
        
        foreach ($actualizacion as $key => $value) 
        {
            if ($registro1x10ffm->$key !== $value)
            {
                $cambios[$key] = ['anterior' => $value, 'nuevo' => $registro1x10ffm->$key];
            }
        }

        Auditoria::create([
            'accion' => 'Actualizado',
            'model_type' => get_class($registro1x10ffm),
            'model_id' => $registro1x10ffm->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($cambios)
        ]);
    }
    public function deleted(Registro1x10ffm $registro1x10ffm): void
    {
        Auditoria::create([
            'accion' => 'Eliminado',
            'model_type' => get_class($registro1x10ffm),
            'model_id' => $registro1x10ffm->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($registro1x10ffm->toArray())
        ]);
    }
    public function restored(Registro1x10ffm $registro1x10ffm): void
    {
        //
    }
    public function forceDeleted(Registro1x10ffm $registro1x10ffm): void
    {
        //
    }
}
